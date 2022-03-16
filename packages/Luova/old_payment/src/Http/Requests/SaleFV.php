<?php

namespace Luova\Sale\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SaleFV extends FormRequest
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
            'party_ac' => 'required|integer',
            'sale_ledger' => 'required|integer',
            'price_type' => 'required',
            'invoice_date' => 'required|date',
            'total' => 'required|numeric|gt:0',
            'discount' => 'nullable|numeric',
            'vat' => 'nullable|numeric',
            'round_of' => 'nullable|numeric',
            'grand_total' => 'required|numeric|gt:0',
            'item'    => 'required|array|min:1',
            'item.*.product'    => 'required|integer',
            'item.*.qty'    => 'required|numeric|gt:0',
            'item.*.rate'    => 'required|numeric',
            'item.*.total'    => 'required|numeric|gt:0',

        ];
    }
    public function messages()
    {
        return [
            'item.*.product.required'    => 'This field is required.',
            'item.*.qty.required'    => 'This field is required.',
            'item.*.rate.required'    => 'This field is required.',
            'item.*.total.required'    => 'This field is required.',
            'item.*.qty.gt'    => 'The qty must be greater than 0.',
        ];
    }

}
