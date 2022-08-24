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
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'roll_number' => $this->faker->randomNumber(5),
            'student_email' => $this->faker->unique()->safeEmail(),
            'student_password' => $this->faker->password()
        ];
    }
}
