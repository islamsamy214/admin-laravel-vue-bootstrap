<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

<<<<<<< HEAD
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
=======
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
class UserFactory extends Factory
{
    protected $model = User::class;

<<<<<<< HEAD
    private $role_id = 0;
    private $team_id = 0;

    public function definition()
    {
        $this->role_id = ($this->role_id % 12) + 1;
        $this->team_id = ($this->team_id % 3) + 1;
        
=======
    public function definition()
    {
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'image' => $this->faker->imageUrl(300, 300, 'people', true, 'Faker'),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
<<<<<<< HEAD
            'type' => 'member',
            'role_id' => $this->role_id,
            'team_id' => $this->team_id,
=======
>>>>>>> aaa72e8d5ba4cbb920c34c85189f8aaa5318b845
        ];
    }

    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
