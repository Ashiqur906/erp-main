<?php

namespace Luova\Inventory\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductFV extends FormRequest
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
        return [
            'title' => 'required|max:191',
            'code' => 'required|max:191|unique:products,code,' . $request->get('id'),
            'sales_price' => 'required',
            'dp_price' => 'required',
            'tp_price' => 'required',
        ];
    }
}
