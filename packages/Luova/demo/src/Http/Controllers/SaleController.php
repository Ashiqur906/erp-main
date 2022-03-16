<?php

namespace Luova\Sale\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;



class SaleController extends Controller
{

    public function __construct()
    {
        //$this->middleware('outlet');
    }

    public function index(Request $request)
    {
        $search  = ['is_active' => 'Yes'];
        dd($search);
    }


    public function add()
    {

        // return view('option::add')->with(['fdata' => null, 'mdata' => null]);
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
