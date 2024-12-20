<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CommunityLink>
 */
class CommunityLinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'user_id' => \App\Models\User::all()->random()->id,
            'channel_id' => \App\Models\Channel::all()->random()->id,
            'title' => $this->faker->sentence,
            'link' => $this->faker->url,
            'approved' => 0
        ];
    }
}
