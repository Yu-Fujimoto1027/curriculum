<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\BillingAddress;
use App\Models\Company;

class BillingAddressFactory extends Factory
{
    protected $model = BillingAddress::class;

    public function definition(): array
    {
        return [
            'company_id' => Company::factory(),
            'name1' => $this->faker->company,
            'name1Kana' => $this->faker->sentence,
            'address' => $this->faker->address,
            'tel' => $this->faker->phoneNumber,
            'depertment' => $this->faker->jobTitle,
            'name2' => $this->faker->name,
            'name2Kana' => $this->faker->name,
        ];
    }
}

