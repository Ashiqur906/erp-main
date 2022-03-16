<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserFV extends FormRequest
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
        // return [
        //     'name' => 'required|max:191',

        // ];

        $roles = [
            'id' => 'required',
        ];

        if ($request->part == 'important') {
            $roles['password'] = 'nullable';
            $roles['email'] = 'required|email|max:191';
            $roles['designation'] = 'nullable|max:191';
            $roles['role'] = 'nullable';
        }
        if ($request->part == 'basic') {

            $roles['name'] = 'required|max:191';
            $roles['mobile'] = 'required|max:191';
            $roles['emargancy_mobile'] = 'nullable|max:191';
            $roles['gender'] = 'required|max:191';
            $roles['marital_status'] = 'required|max:191';
            $roles['religion'] = 'nullable|max:191';
            $roles['nationality'] = 'nullable|max:191';
            $roles['remarks'] = 'nullable|max:191';
            $roles['father_name'] = 'nullable|max:191';
            $roles['husband_name'] = 'nullable|max:191';
            $roles['mother_name'] = 'nullable|max:191';
            $roles['height'] = 'nullable|max:191';
            $roles['weight'] = 'nullable|max:191';
            $roles['photo'] = 'nullable|max:191';
            $roles['is_active'] = 'required|max:191';
        }

        return $roles;
    }
}
