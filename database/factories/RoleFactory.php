<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition(): array
    {
        $this->id++;
        if ($this->id >= 7) {
            $this->id = 1;
            $this->index++;
        }
        return [
            'name' => 'role play ' . $this->index,
            'team_id' => $this->id,
        ];
    }
}
