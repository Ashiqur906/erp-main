<?php

namespace Luova\Direction\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Luova\Direction\Models\District as LuovaDistrict;
use Validator;


class DirectionController extends Controller
{

    public function __construct()
    {
        $this->middleware('outlet');
    }

    public function index(Request $request)
    {
        $search  = [];
        if ($request->get('division')) {
            $search['division'] = $request->get('division');
        }
        if ($request->get('district')) {
            $search['district'] = $request->get('district');
        }
        if ($request->get('thana')) {
            $search['thana'] = $request->get('thana');
        }
        if ($request->get('postoffice')) {
            $search['postoffice'] = $request->get('postoffice');
        }
        if ($request->get('postcode')) {
            $search['postcode'] = $request->get('postcode');
        }
        if ($request->get('village')) {
            $search['village'] = $request->get('village');
        }
        if ($request->get('ward')) {
            $search['ward'] = $request->get('ward');
        }

        //dump($search);
        if (!empty($search)) {
            $mdata = LuovaDistrict::where($search)->paginate(20);
        } else {
            $mdata = LuovaDistrict::paginate(20);
        }



        return view('direction::index')->with(['fdata' => null, 'mdata' => $mdata]);
    }

    public function add()
    {
        $id = null;

        return view('direction::add')->with(['fdata' => null, 'mdata' => null, 'id' => $id]);
    }


    public function edit($id)
    {
        $fdata =   LuovaDistrict::findOrFail($id);

        $id = $fdata->id;


        return view('direction::edit')->with(['fdata' => $fdata, 'mdata' => null, 'id' => $id]);
    }
    public function copy($id)
    {

        $fdata =   LuovaDistrict::findOrFail($id);
        $id = null;
        return view('direction::edit')->with(['fdata' => $fdata, 'mdata' => null, 'id' => $id]);
    }
    public function delete($id)
    {
        $fdata = LuovaDistrict::find($id);

        $fdata->delete();

        return redirect()->route('direction.index')->with('success', 'Successfully Delete');
    }

    public function store(Request $request)
    {
        $id = $request->get('id');
        // store
        $attributes = [
            'division' => $request->get('division'),
            'district' => $request->get('district'),
            'thana' => $request->get('thana'),
            'union' => $request->get('union'),
            'postoffice' => $request->get('postoffice'),
            'village' => $request->get('village'),
            'para' => $request->get('para'),
            'ward' => $request->get('ward'),
            'postcode' => $request->get('postcode'),
        ];

        //dd($request);




        try {

            if ($id) {

                $data =  LuovaDistrict::where('id', $id)->update($attributes);
            } else {
                LuovaDistrict::create($attributes);
            }


            return redirect()->route('direction.index')->with('success', 'Successfully save changed');
        } catch (\Illuminate\Database\QueryException $ex) {

            return redirect()->back()->withErrors($ex->getMessage());
        }
    }

    public function find(Request $request)
    {
        if ($request->get('column') == 'division') {
            $data = get_direction_divistion();
        }
        if ($request->get('column') == 'district') {
            $data = get_direction_district($request);
        }
        if ($request->get('column') == 'thana') {
            $data = get_direction_thana($request);
        }
        if ($request->get('column') == 'union') {
            $data = get_direction_union($request);
        }
        if ($request->get('column') == 'postoffice') {
            $data = get_direction_postoffice($request);
        }
        if ($request->get('column') == 'postcode') {
            $data = get_direction_postcode($request);
        }
        if ($request->get('column') == 'village') {
            $data = get_direction_village($request);
        }
        if ($request->get('column') == 'ward') {
            $data = get_direction_ward($request);
        }
        if ($request->get('column') == 'union-ward') {
            $data = get_direction_union_ward($request);
        }

        return response()->json(['data' => $data]);
    }
}
