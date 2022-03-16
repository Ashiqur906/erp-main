<?php

namespace Luova\Account\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AccountFV extends FormRequest
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
        // dd($request->get('id'));
        // dd($request->segment(2));
        return [
            'title' => 'required|max:191',
            'ac_head' => 'nullable|max:191',
            'code' => 'required|max:191|unique:accounts,code,' . $request->get('id'),
   

        ];
    }
}
