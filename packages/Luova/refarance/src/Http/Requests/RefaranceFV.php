<?php

namespace Luova\Refarance\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RefaranceFV extends FormRequest
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
        // dd($request);
        // dd($request->segment(2));
        return [
            'title' => 'required|max:191',
            'user_id' => 'required',
            'type' => 'required|max:191',
            'file_one' => 'required|max:191',

        ];
    }
}
