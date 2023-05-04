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
    private $index = 1;
    private $round_id = 0;
    public function definition(): array
    {
        $this->id++;
        $this->round_id++;
        if ($this->id >= 4) {
            $this->id = 1;
            $this->index++;
        }

        return [
            'name' => 'role play ' . $this->index,
            'team_id' => $this->id,
            'round_id' => $this->id,
        ];
    }
}
