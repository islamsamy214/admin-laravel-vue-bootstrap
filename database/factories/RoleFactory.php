<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private $id = 0;
    public function definition(): array
    {
        $this->id++;
        return [
            'name' => $this->faker->word,
            'team_id' => $this->id,
        ];
    }
}
