<?php

namespace Database\Factories;

use App\Models\DocumentType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DocumentType>
 */
class DocumentTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'organization_id' => $this->faker->numberBetween(1, 1),
            'name' => $this->faker->word,
            'period' => $this->faker->boolean,
            'sign_first_rol_id' => $this->faker->numberBetween(1, 5),
            'code' => $this->faker->numberBetween(1000, 9999),
            'status' => $this->faker->boolean,
            'masive' => $this->faker->boolean,
            'employee_see' => $this->faker->boolean,
            'regex' => $this->faker->word,
            'c_up_left_x' => $this->faker->randomFloat(2, 0, 100),
            'c_up_left_y' => $this->faker->randomFloat(2, 0, 100),
            'c_down_right_x' => $this->faker->randomFloat(2, 0, 100),
            'c_down_right_y' => $this->faker->randomFloat(2, 0, 100),
            'sign_father_x' => $this->faker->randomFloat(2, 0, 100),
            'sign_father_y' => $this->faker->randomFloat(2, 0, 100),
            'sign_father_high' => $this->faker->randomFloat(2, 0, 100),
            'sign_father_wide' => $this->faker->randomFloat(2, 0, 100),
            'sign_son_x' => $this->faker->randomFloat(2, 0, 100),
            'sign_son_y' => $this->faker->randomFloat(2, 0, 100),
            'sign_son_high' => $this->faker->randomFloat(2, 0, 100),
            'sign_son_wide' => $this->faker->randomFloat(2, 0, 100)
        ];
    }
}
