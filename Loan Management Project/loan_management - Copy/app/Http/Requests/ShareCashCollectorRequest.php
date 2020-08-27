<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShareCashCollectorRequest extends FormRequest
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
    public function rules()
    {
        return [
            'ccname' => 'required',
            'ccnic' => 'required',
            'ccmob' => 'required|size:10|regex:/(07)[0-9]{8}/',
            'ccadd1' => 'required',
            'ccadd2' => 'required',
            'cccity' => 'required',
            'ccdetails' => 'nullable',
            'ccuname' => 'required|unique:login,username',
            'ccpw1' => 'required|confirmed|min:6',
        ];
    }
    public function messages()
    {
        return[
            'ccname.required' => 'The Cash Collector Name field is required.',
             'ccnic.required' => 'The Cash Collector NIC field is required.',
             'ccmob.required' => 'The Cash Collector Mobile field is required.',
             'ccmob.size' => 'Please enter valid Mobile.',
             'ccmob.regex' => 'Please enter valid Mobile.',
             'ccadd1.required' => 'The Cash Collector Address 1 field is required.',
             'ccadd2.required' => 'The Cash Collector Address 2 field is required.',
             'cccity.required' => 'The Cash Collector City field is required.',
             'ccuname.required' => 'The Cash Collector UserName field is required.',
             'ccuname.unique' => 'User Name is already taken.',
             'ccpw1.required' => 'The Cash Collector Password field is required.',
             'ccpw1.confirmed' => 'The password does not match with confirmation password .',
        ];
    }
}
