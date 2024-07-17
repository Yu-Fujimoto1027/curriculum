<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Company;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class CompanyFactory extends Factory
{

    protected $companies = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name1' => $this->faker->sentence,
            'name1Kana' => $this->faker->sentence,
            'address' => $this->faker->address,
            'tel' => $this->faker->randomNumber,
            'name2' => $this->faker->sentence,
            'name2Kana' => $this->faker->sentence,
        ];
    }
}
