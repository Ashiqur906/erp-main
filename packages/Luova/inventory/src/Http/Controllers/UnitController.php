<?php

namespace Luova\Inventory\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Luova\Inventory\Http\Requests\UnitFV;
use Luova\Inventory\Models\Unit;

class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Unit::latest()->get();
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
                    $button .= '<a href="' . route('unit.edit', $data->id) . '" class="btn btn-warning btn-flat"><i class="material-icons">create</i></a>';
                    $button .= '<button type="button" class="btn btn-danger btn-flat"><i class="material-icons">delete_forever</i></button>';
                    $button .= '</div>';
                    return $button;
                })
                ->rawColumns(['role', 'status', 'action'])
                ->make(true);
        }
        $fdata = null;
        $mdata = null;
        return view('inventory::unit.index', compact('mdata', 'fdata'));
    }

    public function add(Request $request)
    {
        $fdata =  null;
        $mdata = null;
        return view('inventory::unit.index', compact('mdata', 'fdata'));
    }
    public function edit(Request $request, $id)
    {
        $fdata =  Unit::findOrFail($id);
        $mdata = null;
        return view('inventory::unit.index', compact('mdata', 'fdata'));
    }
    public function store(UnitFV $request)
    {
        //dd($request);
        $id = $request->get('id');
        // store
        $attributes = [
            'title' => $request->get('title'),
            'remarks' => $request->get('remarks'),
            'sort_by' => $request->get('sort_by'),
            'is_active' => $request->get('is_active') ? $request->get('is_active') : 'No',
            'modified_by' => auth()->user()->id,
        ];

        if (!$id) {
            $attributes['create_by']  = auth()->user()->id;
        }

        try {
            if ($id) {
                $existing = Unit::findOrFail($id);
                $data =  Unit::where('id', $id)->update($attributes);
            } else {
                Unit::create($attributes);
            }
            return redirect()->route('unit.all')->with('success', 'Successfully save changed');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }
}
