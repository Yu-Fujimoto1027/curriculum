<?php

namespace App\Services\Contracts;

use App\Models\BillingAddress;
use Illuminate\Http\Request;

interface BillingAddressServiceInterface
{
    public function createBillingAddress(Request $request): BillingAddress;
}
