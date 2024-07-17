<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\BillingAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BillingAddressRequest;

class BillingAddressController extends Controller
{
    public function __construct(
      private BillingAddress $billing_address
    ) {}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
        ]);
    
        $billingAddress = new BillingAddress();
        $billingAddress->name1 = $request->input('name1');
        $billingAddress->name1Kana = $request->input('name1Kana');
        $billingAddress->address = $request->input('address');
        $billingAddress->tel = $request->input('tel');
        $billingAddress->depertment = $request->input('depertment');
        $billingAddress->name2 = $request->input('name2');
        $billingAddress->name2Kana = $request->input('name2Kana');
        $billingAddress->company_id = $request->input('company_id'); 
    
        $billingAddress->save();
    
        return response()->json($billingAddress, 200);
    }
    
    

    /**
     * Update
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BillingAddressRequest $request, int $id)
    {
        $validated = $request->validated();
        $this->billing_address->findOrFail($id)->update($validated);
        return ['message' => 'ok'];
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
