<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{

    public function definition()
    {
        return [
            'job_category' => $this->faker->randomElement(["Architecture and engineering", "Arts, culture and entertainment", "Business", "Communications", "Community and social services", "Education", "Farming, fishing and forestry", "Government", "Healthcare", "Installation, repairs and maintenance", "Law", "Media and entertainment", "Sales", "Science and technology"]),
            'job_subcategory' => $this->faker->name(),
            'position_name' => $this->faker->name(),
            'position_description' => $this->faker->text(),
            'company_id' => 1,
            'work_modality' => $this->faker->randomElement(['In Person', 'Hybrid', 'Remote']),
            'job_location' => $this->faker->city(),
            'job_salary' => $this->faker->numberBetween($min = 1000, $max = 9000),
            'keywords' => $this->faker->words(2, false)

        ];
    }
}
