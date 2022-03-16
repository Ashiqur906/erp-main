<?php

namespace Luova\Inventory\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Luova\Inventory\Models\Product;
use DataTables;
use Luova\Inventory\Http\Requests\ProductFV;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {


        if ($request->ajax()) {
            $data = Product::latest()->get();
            return DataTables::of($data)
                ->addColumn('stock_in', function ($data) {
                    if($data->current_stock){
                        return $data->current_stock;
                    }else{
                        return 0;
                    }
                         
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
                    $button .= '<a href="' . route('product.edit', $data->id) . '" class="btn btn-warning btn-flat"><i class="material-icons">create</i></a>';
                    $button .= '<button type="button" class="btn btn-danger btn-flat"><i class="material-icons">delete_forever</i></button>';
                    $button .= '</div>';
                    return $button;
                })
                ->rawColumns(['role', 'status', 'action'])
                ->make(true);
        }
        $fdata = null;
        $mdata = null;
        return view('inventory::index', compact('mdata', 'fdata'));
    }

    public function add()
    {

        $fdata = null;
        $mdata = null;

        return view('inventory::add')
            ->with(['fdata' => $fdata, 'mdata' => $mdata]);
    }
    public function edit($id)
    {
        $fdata = Product::findOrFail($id);
        $mdata = null;
        return view('inventory::add')
            ->with(['fdata' => $fdata, 'mdata' => $mdata]);
    }

    public function store(ProductFV $request)
    {

        $id = $request->get('id');
        $attributes = [
            'title' => $request->get('title'),
            'code' => $request->get('code'),
            'unit_id' => $request->get('unit_id'),
            'category_id' => $request->get('category_id'),
            'description' => $request->get('description'),
            'sales_price' => $request->get('sales_price'),
            'dp_price' => $request->get('dp_price'),
            'tp_price' => $request->get('tp_price'),
            'remarks' => $request->get('remarks'),
            'sort_by' => $request->get('sort_by'),
            'is_active' => $request->get('is_active') ? $request->get('is_active') : 'No',
            'modified_by' => auth()->user()->id,
        ];

        if (!$id) {
            $attributes['purchase_price']  = $request->get('purchase_price');
            $attributes['avg_purchase']  = $request->get('avg_purchase');
            $attributes['avg_sale']  = $request->get('avg_sale');
            $attributes['create_by']  = auth()->user()->id;
        }
        // dd($attributes);

        try {
            if ($id) {
                $existing = Product::findOrFail($id);

                $data =  Product::where('id', $id)->update($attributes);
                return redirect()->route('product.all')->with('success', 'Successfully save changed');
            } else {
                Product::create($attributes);
                return redirect()->route('product.all')->with('success', 'Successfully save changed');
            }
            // dd($data);

        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }
}
