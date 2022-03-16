<?php

namespace Luova\Option\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Luova\Option\Http\Requests\OptionFV;
use Luova\Option\Models\Option;
use Luova\Option\Models\OptionDataTable;
use Validator;
use Yajra\DataTables\Services\DataTable;

class OptionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //  dd(config('lv_option.types'));
        return view('option::index')->with(['fdata' => null, 'mdata' => null]);
    }
    // public function gets()
    // {
    //     return DataTables::of(Option::query())->make(true);
    //     // return $dataTable->render('option::gets')->with(['fdata' => null, 'mdata' => null]);
    // }


    public function add()
    {

        // return view('option::add')->with(['fdata' => null, 'mdata' => null]);
    }

    public function edit(Request $request, $id)
    {
        $fdata = Option::findOrFail($id);

        return view('option::index')->with(['fdata' => $fdata, 'mdata' => null]);
    }

    public function store(OptionFV $request)
    {


        $id = $request->get('id');
        // store
        $attributes = [
            'name' => $request->get('name'),
            'type' => $request->get('type'),
            'description' => $request->get('description'),

            'remarks' => $request->get('remarks'),
            'sort_by' => $request->get('sort_by'),
            'is_active' => $request->get('is_active') ? $request->get('is_active') : 'No',
            'modified_by' => auth()->user()->id,

        ];

        if (!$id) {

            $attributes['create_by']  = auth()->user()->id;
        }

        //dump($id);
        //dd($attributes);




        try {

            if ($id) {

                $data =  Option::where('id', $id)->update($attributes);
            } else {
                Option::create($attributes);
            }
            return redirect()->route('option.index')->with('success', 'Successfully save changed');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }

    public function destroy($id)
    {
        //dd($id);
        $cats = Option::find($id);
        $cats->delete();
        return redirect()->route('option.index')->with('success', 'This request has been deleted');
    }
}
