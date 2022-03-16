<?php

namespace Luova\Sale\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Luova\Inventory\Models\Product;
use Luova\Sale\Http\Requests\SaleFV;
use Luova\Sale\Models\Sale;
use Luova\Sale\Models\SaleDetail;
use Luova\Account\Traits\TPosting;

class SaleController extends Controller
{
    use TPosting;
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['webview']]);
    }



    public function index(Request $request)
    {
        

        if ($request->ajax()) {
            $data = Sale::latest()->get();
            return DataTables::of($data)
                ->addColumn('invoice_date', function ($data) {
                        return dmy($data->invoice_date);
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
                ->addColumn('sale_ledger', function ($data) {
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
                    $button .= '<a href="' . route('sale.detail', $data->id) . '" class="btn btn-success btn-flat"><i class="material-icons">visibility</i></a>';
                    $button .= '<a href="' . route('sale.edit', $data->id) . '" class="btn btn-warning btn-flat"><i class="material-icons">create</i></a>';
                    $button .= '<button type="button" class="btn btn-danger btn-flat"><i class="material-icons">delete_forever</i></button>';
                    $button .= '</div>';
                    return $button;
                })
                ->rawColumns(['role', 'status', 'action'])
                ->make(true);
        }
        $fdata = null;
        $mdata = null;
        return view('sale::index', compact('mdata', 'fdata'));
    }
    
    public function add()
    {

        $fdata = null;
        $mdata = null;

        return view('sale::add')
            ->with(['fdata' => $fdata, 'mdata' => $mdata]);
    }

    public function detail(Request $request, $id)
    {
        $fdata =  Sale::FindOrFail($id);
      
        $mdata = null;
        return view('sale::detail', compact('mdata', 'fdata'));
    }

    public function edit(Request $request, $id)
    {
        $fdata = Sale::findOrFail($id);

        $mdata = null;

        return view('sale::add')
            ->with(['fdata' => $fdata, 'mdata' => $mdata]);
    }


    public function store(SaleFV $request)
    {
       
        $id = $request->get('id');
        // store
        $attributes = [
            'invoice_date' => date('Y-m-d', strtotime($request->invoice_date)),
            'party_ac' => $request->party_ac,
            'sale_ledger' => $request->sale_ledger,
            'narration' => $request->narration,
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

        //dump($id);

        try {

            if ($id) {
                // $existing = Category::findOrFail($id);
                // $data =  Category::where('id', $id)->update($attributes);
            } else {

            
               $insert =  Sale::create($attributes);
               $this->SalePosting($request,$insert->id);
               foreach($request->item as $list){
                SaleDetail::create([
                       'sale_id' => $insert->id,
                       'product_id' => $list['product'],
                       'qty' => $list['qty'],
                       'rate' => $list['rate'],
                       'total' => $list['total'],
                       'price_type' => $request->price_type,
                       'is_active' => 'Yes',
                       'modified_by' => auth()->user()->id,
                       'create_by' => auth()->user()->id,
                   ]);
               }
               //dd($details);
          
            }
            return redirect()->route('sale.all')->with('success', 'Successfully save changed');

        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->withErrors($ex->getMessage())->with('myexcep', $ex->getMessage())->withInput();
        }
    }


    public function ajax_rowitem(Request $request)
    {
        $html = null;
        if ($request->rows) {
            $html = view('sale::part.row')->with(['i' => $request->rows])->render();
        }
        return response()->json(['html' => $html]);
    }
    public function ajax_product(Request $request)
    {
        $result = [
            'valid' => 'N',
            'unit' => false
        ];

        if ($request->pid && $request->price_type) {
            $product = Product::findOrFail($request->pid);
           
            $result['price_type'] = $request->price_type;
            $result['stok'] = $request->price_type;
            if( $result['price_type'] == 'MRP'){
                $result['sale_price'] = $product->sales_price;
            }
            if( $result['price_type'] == 'DP'){
                $result['sale_price'] = $product->dp_price;
            }
            if( $result['price_type'] == 'TP'){
                $result['sale_price'] = $product->tp_price;
            }
           
            $result['valid'] = 'Y';

            if ($product->unit && $product->unit->title) {
                $result['unit'] = $product->unit->title;
            }
        }

        //  dd($product->unit);

        return response()->json($result);
    }
}
