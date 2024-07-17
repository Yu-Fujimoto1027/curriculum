<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillingAddress extends Controller
{
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name1' => 'required|string|max:255',
            'name1Kana' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'tel' => 'required|string|max:20',
            'name2' => 'required|string|max:255',
            'name2Kana' => 'required|string|max:255',
        ]);

        $company = Company::create($validatedData);

        return response()->json(['status' => 'success', 'company' => $company], 201);
    }
}
