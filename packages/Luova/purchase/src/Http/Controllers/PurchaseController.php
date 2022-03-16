<?php

namespace Luova\Purchase\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Luova\Inventory\Models\Category;
use Luova\Inventory\Models\Product;
use Luova\Purchase\Http\Requests\PurchaseFV;
use Luova\Purchase\Models\Purchase;
use Luova\Purchase\Models\PurchaseDetail;
use Luova\Account\Traits\TPosting;
use Luova\Inventory\Traits\TProduct;

class PurchaseController extends Controller
{
    use TPosting;
    use TProduct;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Purchase::latest()->get();
            return DataTables::of($data)
                ->addColumn('invoice_date', function ($data) {
                        return dmy($data->invoice_date);
                })
                ->addColumn('date', function ($data) {
                        return dmy($data->date);
                })
                ->addColumn('total', function ($data) {
                        return money($data->total);
                })
                ->addColumn('discount', function ($data) {
                        return money($data->discount);
                })
                ->addColumn('vat', function ($data) {
                        return money($data->vat);
                })
                ->addColumn('round_of', function ($data) {
                        return money($data->round_of);
                })
                ->addColumn('grand_total', function ($data) {
                        return money($data->grand_total);
                })
                ->addColumn('party_ac', function ($data) {
                        return ($data->party)?$data->party->title.' ['.$data->party->code.']': null;
                })
                ->addColumn('purchase_ledger', function ($data) {
                        return ($data->PLedger)?$data->PLedger->title.' ['.$data->PLedger->code.']': null;
                })
                ->addColumn('status', function ($data) {
                    if ($data->is_active == 'Yes') {
                        return '<button type="button" class="edit btn btn-success btn-sm">Active</button>';
                    } else {
                        return '<button type="button" class="edit btn btn-danger btn-sm">Inactive</button>';
                    }
                })
                ->addColumn('action', function ($data) {
                    $button = '  <form action="'.route('purchase.destroy', $data->id).'" method="POST">';
                    $button .=  method_field('DELETE');
                    $button .= csrf_field();
                    $button .= '<div class="btn-group btn-group-sm">';
                    $button .= '<button type="button" class="btn btn-secondary btn-flat"><i class="material-icons">info</i></button>';
                    $button .= '<a href="' . route('purchase.detail', $data->id) . '" class="btn btn-success btn-flat"><i class="material-icons">visibility</i></a>';
                    $button .= '<a href="' . route('purchase.edit', $data->id) . '" class="btn btn-warning btn-flat"><i class="material-icons">create</i></a>';
                    $button .= '<button type="submit" class="btn btn-danger btn-flat"><i class="material-icons">delete_forever</i></button>';
                    $button .= '</div>';
                    $button .= '</form>';
                    return $button;
                })
                ->rawColumns(['role', 'status', 'action'])
                ->make(true);
        }
        $fdata = null;
        $mdata = null;
        return view('purchase::index', compact('mdata', 'fdata'));
    }

    public function add(Request $request)
    {
        $fdata =  null;
        $mdata = null;
        return view('purchase::add', compact('mdata', 'fdata'));
    }

    public function detail(Request $request, $id)
    {
        $fdata =  Purchase::FindOrFail($id);
        $mdata = null;
        return view('purchase::detail', compact('mdata', 'fdata'));
    }
    public function edit(Request $request, $id)
    {
        $fdata =  Purchase::findOrFail($id);
        $mdata = null;
        return view('purchase::add', compact('mdata', 'fdata'));
    }
    public function destroy(Request $request, $id)
    {
        $fdata =  Purchase::findOrFail($id);
        $fdata->journal->ledgers()->delete();
        $fdata->journal()->delete();
        $fdata->details()->delete();
        $fdata->delete();
        return redirect()->route('purchase.all')->with('success', 'Successfully save changed');
    }
    public function store(PurchaseFV $request)
    {
       
    
        $id = $request->get('id');
        // store
        $attributes = [
            'supplier_invoice' => $request->supplier_invoice,
            'invoice_date' => date('Y-m-d', strtotime($request->invoice_date)),
            'party_ac' => $request->party_ac,
            'purchase_ledger' => $request->purchase_ledger,
            'date' => date('Y-m-d', strtotime($request->date)),
            'total' => $request->total,
            'discount' => $request->discount,
            'vat' => $request->vat,
            'round_of' => $request->round_of,
            'grand_total' => $request->grand_total,
            'remarks' => $request->get('remarks'),
            'sort_by' => $request->get('sort_by'),
            'is_active' => 'Yes',
            'modified_by' => auth()->user()->id,
        ];
     
       
        if (!$id) {
            $attributes['create_by']  = auth()->user()->id;
        }

        try {
            if ($id) {
                // $existing = Category::findOrFail($id);
                // $data =  Category::where('id', $id)->update($attributes);
            } else {
               $insert =  Purchase::create($attributes);
               $this->PuerchasePosting($request,$insert->id);
               foreach($request->item as $list){
                PurchaseDetail::create([
                       'purchase_id' => $insert->id,
                       'product_id' => $list['product'],
                       'qty' => $list['qty'],
                       'rate' => $list['rate'],
                       'total' => $list['total'],
                       'is_active' => 'Yes',
                       'modified_by' => auth()->user()->id,
                       'create_by' => auth()->user()->id,
                   ]);
               }
               $this->UpdatePP($request);
               //dd($details);
          
            }
            return redirect()->route('purchase.all')->with('success', 'Successfully save changed');
        } catch (\Illuminate\Database\QueryException $ex) {
            
            return redirect()->back()->withErrors($ex->getMessage())->with('myexcep', $ex->getMessage())->withInput();
        }
    }

    public function ajax_rowitem(Request $request)
    {
        $html = null;
        if ($request->rows) {
            $html = view('purchase::part.row')->with(['i' => $request->rows])->render();
        }
        return response()->json(['html' => $html]);
    }
    public function ajax_product(Request $request)
    {
        $result = [
            'valid' => 'N',
            'unit' => false
        ];

        if ($request->pid) {
            $product = Product::findOrFail($request->pid);
            $result['purchase_price'] = $product->purchase_price;
            $result['valid'] = 'Y';

            if ($product->unit && $product->unit->title) {
                $result['unit'] = $product->unit->title;
            }
        }

        //  dd($product->unit);

        return response()->json($result);
    }
}
