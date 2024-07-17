<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'tel' => 'numeric|min:10',
            'name2' => 'required|string|max:255',
            'name2Kana' => 'required|string|max:255',
        ];
    }
}
