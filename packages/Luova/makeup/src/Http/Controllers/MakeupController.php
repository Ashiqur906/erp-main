<?php

namespace Luova\Makeup\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Luova\Makeup\Http\Requests\MakeupFV;
use Luova\Makeup\Models\Makeup;
use Validator;


class MakeupController extends Controller
{

    public function __construct()
    {
        // $this->middleware('admin');
    }
    public function index()
    {
        // $Makeup = [];

        $mdata = Makeup::get();

        return view('makeup::index')->with(['fdata' => null, 'mdata' => $mdata]);
    }
    public function store(MakeupFV $request)
    {


        $id = $request->get('id');
        // store
        $attributes = [
            'key' => $request->get('key'),
            'display_name' => $request->get('display_name'),
            'value' => $request->get('value'),
            'details' => $request->get('details'),

            'type' => $request->get('type'),
            'order' => ($request->get('order')) ? $request->get('order') : 1,
            'group' => $request->get('group')

        ];

        // dd($attributes);


        try {

            Makeup::create($attributes);

            return redirect()->back()->with('success', 'Successfully save changed');
        } catch (\Illuminate\Database\QueryException $ex) {
            // return $ex->getMessage();
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }
    public function update(Request $request)
    {

        $fdata = $request->all();
        unset($fdata['_token']);




        try {

            foreach ($fdata as $key => $data) {
                //


                if ($request->hasFile($key) || $request->file($key)) {

                    $file = $request->file($key);
                    $destinationPath = storage_path() . '/uploads/setting/';
                    $filename = microtime() . $file->getClientOriginalName();
                    $file->move($destinationPath, $filename);
                    $file_location = url('/storage/uploads/setting/' . $filename);
                    Makeup::where('key', $key)->update(['value' => $file_location]);
                } else {

                    Makeup::where('key', $key)->update(['value' => $data]);
                }
            }
            // dd('dd');

            return redirect()->back()->with('success', 'Successfully save changed');
        } catch (\Illuminate\Database\QueryException $ex) {
            // return $ex->getMessage();
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }
    public function licence(Request $request)
    {
        return view('makeup::licence');
    }
}
