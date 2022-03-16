<?php

namespace Luova\Merchant\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;



class MerchantController extends Controller
{

    public function __construct()
    {
        //$this->middleware('outlet');
    }

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Page::latest()->get();
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
                    $button .= '<a href="' . route('page.edit', $data->id) . '" class="btn btn-warning btn-flat"><i class="material-icons">create</i></a>';
                    $button .= '<a href="' . route('admin.hr.user.view', $data->id) . '" class="btn btn-success btn-flat"><i class="material-icons">visibility</i></a>';
                    $button .= '<button type="button" class="btn btn-danger btn-flat"><i class="material-icons">delete_forever</i></button>';
                    $button .= '</div>';
                    return $button;
                })
                ->rawColumns(['role', 'status', 'action'])
                ->make(true);
        }
        $fdata = null;
        $mdata = null;
        return view('page::index', compact('mdata', 'fdata'));
    }

    public function add()
    {

        $fdata = null;
        $mdata = null;

        return view('merchant::add')
            ->with(['fdata' => $fdata, 'mdata' => $mdata]);
    }

    public function edit(Request $request, $id)
    {
        //
    }

    public function store(Request $request)
    {
        //
    }
}
