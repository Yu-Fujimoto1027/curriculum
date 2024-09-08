<?php

namespace Tests\Feature\Api;

use App\Models\BillingAddress;
use App\Models\Company;
use App\Services\BillingAddressService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class BillingAddressControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @test
     */
    public function test_請求先情報の登録()
    {
        $company = Company::factory()->create();
    
        $params = [
            'name1' => 'テスト：会社名',
            'name1Kana' => 'テスト：会社名（かな）',
            'address' => 'テスト：住所',
            'tel' => '1234567890',
            'depertment' => 'テスト：部署名',
            'name2' => 'テスト：代表者名',
            'name2Kana' => 'テスト：代表者名（かな）',
            'company_id' => $company->id,
        ];
    
        $res = $this->postJson(route('api.billing_address.create'), $params);
        $res->assertStatus(201);
        $billing_address = \App\Models\BillingAddress::where('company_id', $company->id)->first();
        $this->assertEquals($params['name1'], $billing_address->name1);
        $this->assertEquals($params['name1Kana'], $billing_address->name1Kana);
        $this->assertEquals($params['address'], $billing_address->address);
        $this->assertEquals($params['tel'], $billing_address->tel);
        $this->assertEquals($params['depertment'], $billing_address->depertment);
        $this->assertEquals($params['name2'], $billing_address->name2);
        $this->assertEquals($params['name2Kana'], $billing_address->name2Kana);
    }
    
    

    public function test_請求先情報の更新()
    {
        $billing_address = BillingAddress::factory()->create();
        $company = Company::factory()->create();
    
        $params = [
            'name1' => 'テスト：会社名',
            'name1Kana' => 'テスト：会社名（かな）',
            'address' => 'テスト：住所',
            'tel' => '1234567890',
            'depertment' => 'テスト：部署名',
            'name2' => 'テスト：代表者名',
            'name2Kana' => 'テスト：代表者名（かな）',
            'company_id' => $company->id,
        ];
    
        $res = $this->patchJson(route('api.billing_address.update', ['billing_address' => $billing_address->id]), $params);
        $res->assertOk();
        $updatedBillingAddress = BillingAddress::findOrFail($billing_address->id);
    
        $this->assertEquals($params['name1'], $updatedBillingAddress->name1);
        $this->assertEquals($params['name1Kana'], $updatedBillingAddress->name1Kana);
        $this->assertEquals($params['address'], $updatedBillingAddress->address);
        $this->assertEquals($params['tel'], $updatedBillingAddress->tel);
        $this->assertEquals($params['depertment'], $updatedBillingAddress->depertment);
        $this->assertEquals($params['name2'], $updatedBillingAddress->name2);
        $this->assertEquals($params['name2Kana'], $updatedBillingAddress->name2Kana);
        $this->assertEquals($params['company_id'], $updatedBillingAddress->company_id);
    }

    public function test_請求先情報の詳細取得()
    {
        $billing_address = BillingAddress::factory()->create();
        $id = $billing_address->id;
        $res = $this->getJson(route('api.billing_address.show', ['billing_address' => $id]));
        $res->assertOk();    
        $data = $res->json();
    }

    public function test_会社情報の削除()
    {
        $company = Company::factory()->create();
        $billing_address = BillingAddress::factory()->create(['company_id' => $company->id]);
        $id = $billing_address->id;
        $res = $this->deleteJson(route('api.billing_address.destroy', ['billing_address' => $id]));
        $res->assertOk();
        $this->assertNull(BillingAddress::find($id));
    }
    
    

}