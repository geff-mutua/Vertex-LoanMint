<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrower>
 */
class BorrowerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
            'user_id'=>'1',
            'branch_id'=>$this->faker->randomElement(Branch::all()->pluck('id')),
            'first_name'=>$this->faker->unique()->name(),
            'last_name'=>$this->faker->unique()->name(),
            'marital_status'=>$this->faker->randomElement(['Married','Single','Divorced']),
            'id_number'=>$this->faker->randomNumber(8),
            'address'=>$this->faker->address(),
            'mobile'=>$this->faker->randomNumber(5),
            'date_of_birth'=>$this->faker->date(),
            'code'=>$this->faker->postcode(),
            'town'=>$this->faker->address(),
            'residence_address'=>$this->faker->address(),
            'education_level'=>$this->faker->randomElement(['Married','Single','Divorced']),
            'residence_type'=>$this->faker->randomElement(['Rented','Morgage','Owned']),
            'borrower_passport'=>$this->faker->randomNumber(8),
            'borrower_id_photo'=>$this->faker->randomNumber(8)
        ];
    }
}
