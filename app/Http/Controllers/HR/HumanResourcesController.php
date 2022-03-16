<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFV;
use App\Models\User;
use App\Resources\HR\HumanResources;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Luova\Address\Models\Address;
use DataTables;

class HumanResourcesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request)
    {

        $mdata = null;
        return view('hr.dashboard', compact('mdata'));
    }
    public function users(Request $request)
    {

        if ($request->ajax()) {
            $data = User::latest()->get();
            return DataTables::of($data)
                ->addColumn('role', function ($data) {
                    $button = getRoleName($data->id);
                    return $button;
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
                    $button .= '<a href="' . route('admin.hr.user.edit', $data->id) . '" class="btn btn-warning btn-flat"><i class="material-icons">create</i></a>';
                    $button .= '<a href="' . route('admin.hr.user.view', $data->id) . '" class="btn btn-success btn-flat"><i class="material-icons">visibility</i></a>';
                    $button .= '<button type="button" class="btn btn-danger btn-flat"><i class="material-icons">delete_forever</i></button>';
                    $button .= '</div>';
                    return $button;
                })
                ->rawColumns(['role', 'status', 'action'])
                ->make(true);
        }
        $mdata = null;
        return view('hr.users', compact('mdata'));
    }
    public function user_add()
    {
        $mdata = User::get();
        //  dump($mdata);
        return view('hr.users')
            ->with(['mdata' => $mdata]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HumanResources  $humanResources
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mdata = User::findOrFail($id);

        return view('hr.profile')
            ->with(['mdata' => $mdata]);
    }
    public function roles(Request $request)
    {
        $mdata = Role::all();

        return view('hr.roles')
            ->with(['mdata' => $mdata]);
    }
    public function role_permision(Request $request, $id)
    {
        $fdata = Role::findOrFail($id);

        //dump($fdata->permissions);
        $mdata = Permission::all();

        return view('hr.permision')
            ->with(['fdata' => $fdata, 'mdata' => $mdata]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HumanResources  $humanResources
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $fdata = User::findOrFail($id);
        $frole = $fdata->getRoleNames()->first();
        $address = Address::where(['user_id' => $fdata->id, 'is_active' => 'Yes'])->get();


        return view('hr.edit_user')
            ->with(['fdata' => $fdata, 'frole' => $frole, 'address' => $address, 'roles' => Role::get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HumanResources  $humanResources
     * @return \Illuminate\Http\Response
     */
    public function update(UserFV $request)
    {


        $attributes = [
            'modified_by' => auth()->user()->id,
        ];
        // store
        if ($request->get('part') == 'important') {
            $attributes['email'] = $request->get('email');
            $attributes['designation'] = $request->get('designation');
            if ($request->get('password')) {
                $attributes['password'] = Hash::make($request->get('password'));
            }
        }
        if ($request->get('part') == 'basic') {
            $attributes['name'] = $request->get('name');
            $attributes['mobile'] = $request->get('mobile');
            $attributes['emargancy_mobile'] = $request->get('emargancy_mobile');
            $attributes['religion'] = $request->get('religion');
            $attributes['nationality'] = $request->get('nationality');
            $attributes['remarks'] = $request->get('remarks');
            $attributes['gender'] = $request->get('gender');
            $attributes['marital_status'] = $request->get('marital_status');
            $attributes['father_name'] = $request->get('father_name');
            $attributes['mother_name'] = $request->get('mother_name');
            $attributes['husband_name'] = $request->get('husband_name');
            $attributes['height'] = $request->get('height');
            $attributes['weight'] = $request->get('weight');
            $attributes['photo'] = $request->get('photo');
            $attributes['is_active'] = $request->get('is_active');
        }

        try {

            $existing = User::findOrFail($request->id);

            if ($request->part == 'important' && $request->role) {
                //
                $role = Role::findById($request->role);
                $role_name = $role->name;

                $roles = $existing->getRoleNames();

                if (!empty($roles)) {
                    foreach ($roles as $role) {
                        $existing->removeRole($role);
                    }
                }
                // dd($role->name);
                $existing->assignRole($role_name);
            }


            $data =  User::where('id', $existing->id)->update($attributes);
            return redirect()->route('admin.hr.user.view', $existing->id)->with('success', 'Successfully save changed');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HumanResources  $humanResources
     * @return \Illuminate\Http\Response
     */
    public function destroy(HumanResources $humanResources)
    {
        //
    }
    public function role_store(Request $request)
    {
        //  dd($request);
        if ($request->name) {
            try {

                if ($request->id) {
                    $existing = Role::findOrFail($request->id);
                    $data =  Role::where('id', $request->id)->update(['name' => $request->name]);
                } else {
                    Role::create(['name' => $request->name]);
                }
                return redirect()->route('admin.hr.roles')->with('success', 'Successfully save changed');
            } catch (\Illuminate\Database\QueryException $ex) {
                return redirect()->back()->withErrors($ex->getMessage());
            }
        }
        return redirect()->back()->withErrors($ex->getMessage());
    }
    public function permision_store(Request $request)
    {
        //  dd($request);
        if ($request->name) {
            try {

                if ($request->id) {
                    $existing = Permission::findOrFail($request->id);
                    $data =  Permission::where('id', $request->id)->update(['name' => $request->name]);
                } else {
                    Permission::create(['name' => $request->name]);
                }
                return redirect()->back()->with('success', 'Successfully save changed');
            } catch (\Illuminate\Database\QueryException $ex) {
                return redirect()->back()->withErrors($ex->getMessage());
            }
        }
        return redirect()->back()->withErrors($ex->getMessage());
    }
    public function role_permission_assaing(Request $request)
    {



        $role = Role::findById($request->role);
        $permission = Permission::findById($request->permission);


        if ($role && $permission) {
            try {
                if ($request->type == 'Add') {
                    $role->givePermissionTo($permission);
                } else {
                    $role->revokePermissionTo($permission);
                }
                return response()->json(['pass' => 'Yes']);
            } catch (\Illuminate\Database\QueryException $ex) {
                //

            }
        }
        return response()->json(['pass' => 'No']);
    }
    public function role_ajax($id = null)
    {
        $html = "";
        $pass = 'No';

        if ($id) {
            $roles = Role::findOrFail($id);
            $html .= ' <input name="id" type="hidden" value="' . $roles->id . '">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input placeholder="Role name" value="' . $roles->name . '" name="name" type="text" id="name" class="form-control">

                    </div>';
            $pass = 'Yes';
        } else {
            $html .= ' <input name="id" type="hidden">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input placeholder="Role name" value="" name="name" type="text" id="name" class="form-control">

                    </div>';
            $pass = 'Yes';
        }

        return response()->json(['data' => $html, 'pass' => $pass]);
    }
    public function permission_ajax($id = null)
    {
        $html = "";
        $pass = 'No';

        if ($id) {
            $permission = Permission::findOrFail($id);
            $html .= ' <input name="id" type="hidden" value="' . $permission->id . '">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input placeholder="Role name" value="' . $permission->name . '" name="name" type="text" id="name" class="form-control">

                    </div>';
            $pass = 'Yes';
        } else {
            $html .= ' <input name="id" type="hidden">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input placeholder="Role name" value="" name="name" type="text" id="name" class="form-control">

                    </div>';
            $pass = 'Yes';
        }

        return response()->json(['data' => $html, 'pass' => $pass]);
    }
}
