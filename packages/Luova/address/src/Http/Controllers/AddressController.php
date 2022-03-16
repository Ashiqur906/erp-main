<?php

namespace Luova\Address\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Luova\Address\Http\Requests\AddressFV;
use Luova\Address\Models\Address;
use Validator;
use DataTables;



class AddressController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {


        $mdata = Address::latest()->paginate(15);
        return view('address::index')->with(['fdata' => null, 'mdata' => $mdata]);
    }


    public function add($id)
    {
        $user = User::findOrFail($id);
        return view('address::add')->with(['fdata' => null, 'mdata' => null, 'user' => $user]);
    }

    public function edit(Request $request, $id)
    {
        $fdata = Address::findOrFail($id);

        return view('address::index')->with(['fdata' => $fdata, 'mdata' => null]);
    }

    public function store(AddressFV $request)
    {

        $user = User::findOrFail($request->get('user_id'));
        $id = $request->get('id');
        // store

        $attributes = [

            'type' => $request->get('type'),
            'user_id' => $request->get('user_id'),
            'division' => $request->get('division'),
            'district' => $request->get('district'),
            'thana' => $request->get('thana'),
            'union' => $request->get('union'),
            'postoffice' => $request->get('postoffice'),
            'village' => $request->get('village'),
            'para' => $request->get('para'),
            'ward' => $request->get('ward'),
            'postcode' => $request->get('postcode'),
            'house_no' => $request->get('house_no'),
            'aprtment_no' => $request->get('aprtment_no'),

            'remarks' => $request->get('remarks'),
            'sort_by' => $request->get('sort_by'),
            'is_active' => $request->get('is_active') ? $request->get('is_active') : 'Yes',
            'modified_by' => auth()->user()->id,
        ];

        if (!$id) {

            $attributes['create_by']  = auth()->user()->id;
        }

        //dump($id);

        try {

            if ($id) {
                $existing = Address::findOrFail($id);
                $data =  Address::where('id', $id)->update($attributes);
            } else {
                Address::create($attributes);
            }
            return redirect()->route('admin.hr.user.view', $user->id)->with('success', 'Successfully save changed');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }

    public function destroy($id)
    {
        //dd($id);
        $cats = Address::find($id);
        $cats->delete();
        return redirect()->route('address.index')->with('success', 'This request has been deleted');
    }
}
