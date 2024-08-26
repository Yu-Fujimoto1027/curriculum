<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\BillingAddress;
use App\Models\Company; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BillingAddressRequest;
use App\Services\BillingAddressService;
use Illuminate\Http\JsonResponse;

class BillingAddressController extends Controller
{
    protected $billingAddressService;

    public function __construct(BillingAddressService $billingAddressService)
    {
        $this->billingAddressService = $billingAddressService;
    }


    public function store(Request $request)
    {

        $companyId = $request->input('company_id');
        $company = Company::findOrFail($companyId);

        $validated = $request->validate([
            'name1' => 'nullable|string|max:255',
            'name1Kana' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'tel' => 'required|string|max:255',
            'depertment' => 'required|string|max:255',
            'name2' => 'required|string|max:255',
            'name2Kana' => 'required|string|max:255',
        ]);

        $validated['company_id'] = $company->id;
        $billingAddress = $this->billingAddressService->createBillingAddress($validated);
        return response()->json($billingAddress, 201);
    }
    
    
    public function update(BillingAddressRequest $request, int $id)
    {
        $validated = $request->validated();
        
        $billingAddress = BillingAddress::findOrFail($id);
        $billingAddress->update($validated);
        
        return response()->json(['message' => 'ok'], 200);
    }

    /**
     * Show
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $billing_address = BillingAddress::findOrFail($id);
        return response()->json($billing_address);
    }

    /**
     * Destroy
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $billing_address = BillingAddress::findOrFail($id);
        $billing_address->delete();
        return ['message' => 'ok'];
    }



}
