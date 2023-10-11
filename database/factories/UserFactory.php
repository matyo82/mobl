<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fake_images = ['images/users/test.jpg', 'images/users/test2.jpg', 'images/users/test3.jpg'];
        $email = [now(), null];

        return [
            'name' => $this->faker->name(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => $email[rand(0, 1)],
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
            'user_type' => 0 | 1,
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'image' => $fake_images[rand(0, 2)],
            'current_team_id' => null,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     */
    public function withPersonalTeam(callable $callback = null): static
    {
        if (!Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(fn(array $attributes, User $user) => [
        'name' => $user->name . '\'s Team',
        'user_id' => $user->id,
        'personal_team' => true,
    ])
                ->when(is_callable($callback), $callback),
            'ownedTeams'
        );
    }
}
