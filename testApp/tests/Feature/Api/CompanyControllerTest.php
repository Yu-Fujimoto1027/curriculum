<?php

namespace Tests\Feature\Api;

use App\Models\Company;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CompanyControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @test
     */
    public function test_会社情報の登録()
    {
        $params = [
            'name1' => 'テスト会社名',
            'name1Kana' => 'テスト会社名かな',
            'address' => 'テスト住所',
            'tel' => '1234567890',
            'name2' => 'テスト代表者名',
            'name2Kana' => 'テスト代表者名かな',
        ];

        $res = $this->postJson(route('api.company.create'), $params);
        $res->assertStatus(201);

        $companies = Company::all();
        $this->assertCount(1, $companies);

        $company = $companies->first();
        $this->assertEquals($params['name1'], $company->name1);
        $this->assertEquals($params['name1Kana'], $company->name1Kana);
        $this->assertEquals($params['address'], $company->address);
        $this->assertEquals($params['tel'], $company->tel);
        $this->assertEquals($params['name2'], $company->name2);
        $this->assertEquals($params['name2Kana'], $company->name2Kana);
    }


    public function 会社請情報の取得()
    {
        $company = Company::factory()->create();
        $res = $this->postJson(route('api.company.create'), $company->id);
        $res->assertOk();
        $data = $res->json();
    }

    public function test_会社情報の更新()
    {
        $company = Company::factory()->create();
        
        $params = [
            'name1' => 'テスト：会社名',
            'name1Kana' => 'テスト：会社名（かな）',
            'address' => 'テスト：住所',
            'tel' => '1234567890',
            'name2' => 'テスト：代表者名',
            'name2Kana' => 'テスト：代表者名（かな）',
        ];
    
        $res = $this->patchJson(route('api.company.update', ['company' => $company->id]), $params);
        $res->assertOk();
        
        $updatedCompany = Company::findOrFail($company->id);
    
        $this->assertEquals($params['name1'], $updatedCompany->name1);
        $this->assertEquals($params['name1Kana'], $updatedCompany->name1Kana);
        $this->assertEquals($params['address'], $updatedCompany->address);
        $this->assertEquals($params['tel'], $updatedCompany->tel);
        $this->assertEquals($params['name2'], $updatedCompany->name2);
        $this->assertEquals($params['name2Kana'], $updatedCompany->name2Kana);
    }

    public function test_会社情報の詳細取得()
    {
        $company = Company::factory()->create();
    
        $id = $company->id;
        $res = $this->getJson(route('api.company.show', ['company' => $id]));
        $res->assertOk();    
        $data = $res->json();
    
    }

    public function test_会社情報の削除()
    {

        $company = Company::factory()->create();
        $id = $company->id;
        $res = $this->deleteJson(route('api.company.destroy', ['company' => $id]));
        $res->assertOk();
        $this->assertNull(Company::find($id));

    }
    
    public function 会社情報と請求先情報を同時取得する()
    {
        $id = $company->id;
        $res = $this->postJson(route('api.company.show.with_billing'), ['company' => $id], ['billing_address' => $id]);
        $res->assertOk();    
        $data = $res->json();

    }

}
