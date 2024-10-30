<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
	{
		return [
			'name' => $this->faker->name,
			'address' => $this->faker->streetAddress(),
			'phone' => $this->faker->regexify('\d{3}-\d{3}-\d{4}'),
			'email' => $this->faker->unique()->safeEmail(),
			'birthday' => $this->faker->dateTimeBetween('-50 year', '-16 year')->format('Y-m-d'),
			'city_id' => $this->faker->numberBetween(1, 15)
		];
	}
}
