<?php

namespace Luova\Account\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Luova\Account\Http\Requests\AccountFV;
use Luova\Account\Models\Account;
use Luova\Account\Models\AccountHead;
use Luova\Account\Models\AccountJournal;
use Luova\Account\Models\AccountLedger;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Account::latest()->get();
            return DataTables::of($data)
                ->addColumn('status', function ($data) {
                    if ($data->is_active == 'Yes') {
                        return '<button type="button" class="edit btn btn-success btn-sm">Active</button>';
                    } else {
                        return '<button type="button" class="edit btn btn-danger btn-sm">Inactive</button>';
                    }
                })
                ->addColumn('action', function ($data) {
                    $button = '<div class="btn-group btn-group-sm">';
                    $button .= '<button type="button" class="btn btn-secondary btn-flat"><i class="material-icons">info</i></button>';
                    $button .= '<a href="' . route('account.edit', $data->id) . '" class="btn btn-warning btn-flat"><i class="material-icons">create</i></a>';
                    $button .= '<button type="button" class="btn btn-danger btn-flat"><i class="material-icons">delete_forever</i></button>';
                    $button .= '</div>';
                    return $button;
                })
                ->rawColumns(['role', 'status', 'action'])
                ->make(true);
        }
        $fdata = null;
        $mdata = null;
        return view('account::chart_of_accounts', compact('mdata', 'fdata'));
    }
    public function journal(Request $request)
    {
 
   
        if ($request->ajax()) {
            $data = AccountJournal::latest()->get();
            return DataTables::of($data)
                ->addColumn('voucher_type', function ($data) {
                        return ($data->voucher_type)?class_basename($data->voucher_type):null;
                })
             
                ->addColumn('amount', function ($data) {
                        return money($data->amount);
                })
           
                ->addColumn('invoice_date', function ($data) {
                        return ($data->invoice_date)?date('d-M-Y',strtotime($data->invoice_date)): null;
                })
                ->addColumn('created_at', function ($data) {
                        return ($data->created_at)?date('d-M-Y H:i a',strtotime($data->created_at)): null;
                })
                ->addColumn('receipt_ledger', function ($data) {
                        return ($data->ledger)?$data->ledger->title.' ['.$data->ledger->code.']': null;
                })
                ->addColumn('status', function ($data) {
                    if ($data->is_active == 'Yes') {
                        return '<button type="button" class="edit btn btn-success btn-sm">Active</button>';
                    } else {
                        return '<button type="button" class="edit btn btn-danger btn-sm">Inactive</button>';
                    }
                })
                ->addColumn('action', function ($data) {
                    $button = '<div class="btn-group btn-group-sm">';
                    $button .= '<button type="button" class="btn btn-secondary btn-flat"><i class="material-icons">info</i></button>';
                    $button .= '<a href="' . route('account.journal.detail', $data->id) . '" class="btn btn-success btn-flat"><i class="material-icons">visibility</i></a>';
                    $button .= '<button type="button" class="btn btn-danger btn-flat"><i class="material-icons">delete_forever</i></button>';
                    $button .= '</div>';
                    return $button;
                })
                ->rawColumns(['role', 'status', 'action'])
                ->make(true);
        }
        $fdata = null;
        $mdata = null;
        return view('account::journal', compact('mdata', 'fdata'));
    }

    public function ledger(Request $request)
    {
 
   
        if ($request->ajax()) {
            $data = AccountLedger::latest()->get();
            return DataTables::of($data)

                ->addColumn('account', function ($data) {
                        return  $data->account->title . ' ['. $data->account->code.']' ;
                })
                ->addColumn('account_head', function ($data) {
                        return  $data->account->head->title;
                })
             
                ->addColumn('debit', function ($data) {
                        return money($data->debit);
                })
                ->addColumn('credit', function ($data) {
                        return money($data->credit);
                })
                ->addColumn('created_at', function ($data) {
                        return ($data->created_at)?date('d-M-Y H:i a',strtotime($data->created_at)): null;
                })
        
                ->rawColumns(['role', 'status', 'action'])
                ->make(true);
        }
        $fdata = null;
        $mdata = null;
        return view('account::ledger', compact('mdata', 'fdata'));
    }
   
   
    public function journal_detail(Request $request, $id)
    {
   

        $fdata = null;
        $mdata = AccountJournal::findOrFail($id);
        return view('account::journal_detail', compact('mdata', 'fdata'));

    }
    public function balance_sheet(Request $request)
    {
      
        $stock = $this->bs_stock();
        $profit_los = $this->bs_profit_los();
       
        //dd($purchage);
        $expense = AccountHead::where('type','Expense')->get();
      
      
    
        $assets = AccountHead::where('type','Asset')->get();
        $closing_stock = ClosingStock();
        
        $bs_assets = [
            [
                'name' => 'Current Assets',
                'data' => [
                    [
                        'name' => 'Closing Stock',
                        'amount' =>$stock
                    ]
                ],
                'total' => $stock
            ]

        ];
        $bs_pal = [
            [
                'name' => 'Profit & Loss A/c',
                'data' => [
                    [
                        'name' => 'Current Period',
                        'amount' =>$profit_los
                    ]
                ],
                'total' => $profit_los
            ]

        ];
      
        //dd($assets->ledgers()->sum('debit'));
        $liabilities = AccountHead::where('type','Liability')->get();
        return view('account::balance_sheet')->with([
            'expenses' => $expense,
            'bs_pal' => $bs_pal,
            'assets' => $assets,
            'liabilities' => $liabilities,
            'bs_assets' =>$bs_assets
        ]);

    }

    public function add(Request $request)
    {
        $fdata =  null;
        $mdata = null;
        return view('account::add', compact('mdata', 'fdata'));
    }
    public function edit(Request $request, $id)
    {
        $fdata =  Account::findOrFail($id);
       
        return view('account::add', compact( 'fdata'));
    }
    public function store(AccountFV $request)
    {
  //  dd($request);
        $id = $request->get('id');
        // store
        $attributes = [
            'title' => $request->title,
            'ac_head' => $request->ac_head,
            'user_id' => $request->user_id,
            'code' => $request->code,
            'remarks' => $request->remarks,
            'sort_by' => $request->sort_by,
            'is_active' => $request->is_active ? $request->is_active : 'No',
            'modified_by' => auth()->user()->id,
        ];

        if (!$id) {
            $attributes['create_by']  = auth()->user()->id;
        }

        try {
            if ($id) {
                $existing = Account::findOrFail($id);
                $data =  Account::where('id', $id)->update($attributes);
            } else {
                Account::create($attributes);
            }
            return redirect()->route('account.all')->with('success', 'Successfully save changed');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }

    public function bs_stock(){
        $purchage_dr = AccountHead::where('id',1)->first()->ledgers()->sum('debit');
        $purchage_cr = AccountHead::where('id',1)->first()->ledgers()->sum('credit');
        $purchage = $purchage_dr - $purchage_cr;
        $sale_dr = AccountHead::where('id',2)->first()->ledgers()->sum('debit');
        $sale_cr = AccountHead::where('id',2)->first()->ledgers()->sum('credit');
        $sale = $sale_cr - $sale_dr;
       
        return  ($purchage - $sale);
    }

    public function bs_profit_los(){


        $income_dr =AccountHead::where('id',23)->first()->ledgers()->sum('debit');
        $income_cr =AccountHead::where('id',23)->first()->ledgers()->sum('credit');
        $net_income =  $income_cr - $income_dr;
        $expance_dr =AccountHead::where('id',4)->first()->ledgers()->sum('debit');
        $expance_cr =AccountHead::where('id',4)->first()->ledgers()->sum('credit');
 
        $net_expance =  $expance_cr - $expance_dr;

    
       
        return $net_income - $net_expance;
    }
}
