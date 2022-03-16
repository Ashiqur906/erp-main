<?php

namespace Luova\Makeup\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class MakeupFV extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        //dd($request->get('id'));
        // dd($request->segment(2));
        return [
            'key' => 'required|alpha_dash|unique:makeups,id',
            'display_name' => 'required||max:191',
            'display_name' => 'required||max:191|',

        ];
    }
}
