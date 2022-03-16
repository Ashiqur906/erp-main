<?php

namespace Luova\Refarance\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Luova\Refarance\Http\Requests\RefaranceFV;
use Luova\Refarance\Models\Refarance;
use Validator;
use DataTables;



class RefaranceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {


        $mdata = Refarance::latest()->paginate(15);
        return view('refarance::index')->with(['fdata' => null, 'mdata' => $mdata]);
    }


    public function add($id)
    {
        $user = User::findOrFail($id);
        return view('refarance::add')->with(['fdata' => null, 'mdata' => null, 'user' => $user]);
    }

    public function edit(Request $request, $id)
    {
        $fdata = Refarance::findOrFail($id);

        return view('refarance::index')->with(['fdata' => $fdata, 'mdata' => null]);
    }

    public function store(RefaranceFV $request)
    {
        $isUser = User::findOrFail($request->get('user_id'));
        $id = $request->get('id');
        // store
        $attributes = [
            'title' => $request->get('title'),
            'type' => $request->get('type'),
            'user_id' => $request->get('user_id'),
            'description' => $request->get('description'),
            'file_one' => $request->get('file_one'),
            'file_two' => $request->get('file_two'),
            'file_three' => $request->get('file_three'),

            'remarks' => $request->get('remarks'),
            'sort_by' => $request->get('sort_by'),
            'is_active' => $request->get('is_active') ? $request->get('is_active') : 'No',
            'modified_by' => auth()->user()->id,
        ];

        if (!$id) {

            $attributes['create_by']  = auth()->user()->id;
        }

        //dump($id);

        try {

            if ($id) {
                $existing = Refarance::findOrFail($id);
                $data =  Refarance::where('id', $id)->update($attributes);
            } else {
                Refarance::create($attributes);
            }
            return redirect()->route('refarance.index')->with('success', 'Successfully save changed');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }

    public function destroy($id)
    {
        //dd($id);
        $cats = Refarance::find($id);
        $cats->delete();
        return redirect()->route('refarance.index')->with('success', 'This request has been deleted');
    }
}
