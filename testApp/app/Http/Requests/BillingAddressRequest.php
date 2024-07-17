<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillingAddressRequest extends FormRequest
{
    public function authorize()
    {
        return true; //
    }

    public function rules()
    {
        return [
            'name1' => 'required|string|max:255',
            'name1Kana' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'tel' => 'string|regex:/^[0-9\-()]+$/|max:20',
            'depertment' => 'required|string|max:255',
            'name2' => 'required|string|max:255',
            'name2Kana' => 'required|string|max:255',
        ];
    }
}
