<?php

namespace App\Services;

use App\Models\BillingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\Contracts\BillingAddressServiceInterface;
use Illuminate\Support\Facades\DB;

class BillingAddressService
{
    public function createBillingAddress(array $data): BillingAddress
    {
        return DB::transaction(function () use ($data) {
            $billingAddress = new BillingAddress($data);
            $billingAddress->save();

            return $billingAddress;
        });
    }
}
