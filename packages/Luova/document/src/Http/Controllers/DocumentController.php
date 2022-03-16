<?php

namespace Luova\Document\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Luova\Document\Http\Requests\DocumentFV;
use Luova\Document\Models\Document;
use Validator;
use DataTables;



class DocumentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {


        $mdata = Document::latest()->paginate(15);
        return view('document::index')->with(['fdata' => null, 'mdata' => $mdata]);
    }


    public function add($id)
    {
        $user = User::findOrFail($id);
        return view('document::add')->with(['fdata' => null, 'mdata' => null, 'user' => $user]);
    }

    public function edit(Request $request, $id)
    {
        $fdata = Document::findOrFail($id);

        return view('document::index')->with(['fdata' => $fdata, 'mdata' => null]);
    }

    public function store(DocumentFV $request)
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
                $existing = Document::findOrFail($id);
                $data =  Document::where('id', $id)->update($attributes);
            } else {
                Document::create($attributes);
            }
            return redirect()->route('document.index')->with('success', 'Successfully save changed');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }

    public function destroy($id)
    {
        //dd($id);
        $cats = Document::find($id);
        $cats->delete();
        return redirect()->route('document.index')->with('success', 'This request has been deleted');
    }
}
