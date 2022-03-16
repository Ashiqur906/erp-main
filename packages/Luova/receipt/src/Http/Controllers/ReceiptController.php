<?php

namespace Luova\Receipt\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Luova\Account\Models\Account;
use Luova\Inventory\Models\Product;
use Luova\Receipt\Http\Requests\ReceiptFV;
use Luova\Receipt\Models\Receipt;
use Luova\Receipt\Models\ReceiptDetail;
use Luova\Account\Traits\TPosting;

class ReceiptController extends Controller
{
    use TPosting;
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['webview']]);
    }



    public function index(Request $request)
    {
        

        if ($request->ajax()) {
            $data = Receipt::latest()->get();
            return DataTables::of($data)
                ->addColumn('invoice_date', function ($data) {
                        return dmy($data->invoice_date);
                })
           
                ->addColumn('total_debit', function ($data) {
                        return money($data->total_debit);
                })
           
                ->addColumn('party_ac', function ($data) {
                        return ($data->party)?$data->party->title.' ['.$data->party->code.']': null;
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
                    $button .= '<a href="' . route('receipt.detail', $data->id) . '" class="btn btn-success btn-flat"><i class="material-icons">visibility</i></a>';
                    $button .= '<a href="' . route('receipt.edit', $data->id) . '" class="btn btn-warning btn-flat"><i class="material-icons">create</i></a>';
                    $button .= '<button type="button" class="btn btn-danger btn-flat"><i class="material-icons">delete_forever</i></button>';
                    $button .= '</div>';
                    return $button;
                })
                ->rawColumns(['role', 'status', 'action'])
                ->make(true);
        }
        $fdata = null;
        $mdata = null;
        return view('receipt::index', compact('mdata', 'fdata'));
    }
    
    public function add()
    {

        $fdata = null;
        $mdata = null;

        return view('receipt::add')
            ->with(['fdata' => $fdata, 'mdata' => $mdata]);
    }

    public function detail(Request $request, $id)
    {
        $fdata =  Receipt::FindOrFail($id);
      
        $mdata = null;
        return view('receipt::detail', compact('mdata', 'fdata'));
    }

    public function edit(Request $request, $id)
    {
        $fdata = Receipt::findOrFail($id);

        $mdata = null;

        return view('receipt::add')
            ->with(['fdata' => $fdata, 'mdata' => $mdata]);
    }


    public function store(ReceiptFV $request)
    {
        //dd($request);
        $id = $request->get('id');
        // store
        $attributes = [
            'invoice_date' => date('Y-m-d', strtotime($request->invoice_date)),
            'narration' => $request->narration,
            'total_debit' => $request->total_debit,
            'total_credit' => $request->total_credit,
            'remarks' => $request->get('remarks'),
            'sort_by' => $request->get('sort_by'),
            'is_active' => 'Yes',
            'modified_by' => auth()->user()->id,
        ];
        //dd($attributes);
        if (!$id) {
            $attributes['create_by']  = auth()->user()->id;
        }
        //dump($id);
        try {
            if ($id) {
                // $existing = Category::findOrFail($id);
                // $data =  Category::where('id', $id)->update($attributes);
            } else {
               $insert =  Receipt::create($attributes);
               $this->ReceiptPosting($request,$insert->id);
               foreach($request->item as $list){
                ReceiptDetail::create([
                       'receipt_id' => $insert->id,
                       'account_id' => $list['account'],
                       'debit' => $list['debit'],
                       'credit' => $list['credit'],
                       'is_active' => 'Yes',
                       'modified_by' => auth()->user()->id,
                       'create_by' => auth()->user()->id,
                   ]);
               }
            }
            return redirect()->route('receipt.all')->with('success', 'Successfully save changed');

        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->withErrors($ex->getMessage())->with('myexcep', $ex->getMessage())->withInput();
        }
    }


    public function ajax_rowitem(Request $request)
    {
        $html = null;
        if ($request->rows) {
            $html = view('receipt::part.row')->with(['i' => $request->rows])->render();
        }
        return response()->json(['html' => $html]);
    }
    public function ajax_account(Request $request)
    {
        $result = [
            'valid' => 'N',
            'currency' => 'Tk.'
        ];

        if ($request->pid) {
            $account = Account::findOrFail($request->pid);
            $head = $account->head->type;
            $debit =$account->ledgers()->sum('debit');
            $credit = $account->ledgers()->sum('credit');
            $balance = $debit - $credit;

            if($head =='Liability'){
                $result['balance'] = $credit - $debit;              
                $result['debit'] = true;
                $result['credit'] = false;
            }else{
                $result['balance'] = $debit - $credit;
                $result['debit'] = false;
                $result['credit'] = true;
            }
           
            $result['valid'] = 'Y';
        }
  

        return response()->json($result);
    }
}
