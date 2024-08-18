<?php

namespace App\Services;

use App\Models\BillingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BillingAddressService
{
    public function createBillingAddress(Request $request): BillingAddress
    {
        try {
            $billingAddress = new BillingAddress();
            $billingAddress->name1 = $request->input('name1');
            $billingAddress->name1Kana = $request->input('name1Kana');
            $billingAddress->address = $request->input('address');
            $billingAddress->tel = $request->input('tel');
            $billingAddress->depertment = $request->input('depertment'); // Corrected typo
            $billingAddress->name2 = $request->input('name2');
            $billingAddress->name2Kana = $request->input('name2Kana');
            $billingAddress->company_id = $request->input('company_id');

            $billingAddress->save();

            return $billingAddress;
        } catch (\Exception $e) {
            Log::error('Error in BillingAddressService: ' . $e->getMessage());
            throw $e;
        }
    }
}