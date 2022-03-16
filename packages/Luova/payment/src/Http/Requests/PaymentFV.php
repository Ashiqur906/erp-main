<?php

namespace Luova\Payment\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PaymentFV extends FormRequest
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
        $rules = [

            'invoice_date' => 'required|date',
            'total_debit' => 'required|numeric|gt:0|same:total_credit',
            'total_credit' => 'required|numeric|gt:0|same:total_debit',
            'item'    => 'required|array|min:2',
            'item.*.account'    => 'required|integer'
        ];

        foreach($request->item as $key => $list){
          
            if($list['debit']){
                $rules['item.'.$key.'.debit'] = 'required|numeric|gt:0';
            }elseif($list['credit']){
                $rules['item.'.$key.'.credit'] = 'required|numeric|gt:0';
            }else{
                $rules['item.'.$key.'.debit'] = 'required';
                $rules['item.'.$key.'.credit'] = 'required';
            }
        }

        return $rules;
      
    }
    public function messages()
    {
        return [
            'item.*.account.required'    => 'This field is required.',
        ];
    }

}
