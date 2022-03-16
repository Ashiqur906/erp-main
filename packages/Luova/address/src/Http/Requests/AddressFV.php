<?php

namespace Luova\Address\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AddressFV extends FormRequest
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

        // dd($request->segment(2));
        return [
            'user_id' => 'required',
            'type' => 'required|max:191',
            'division' => 'required|max:191',
            'district' => 'required|max:191',


        ];
    }
}
