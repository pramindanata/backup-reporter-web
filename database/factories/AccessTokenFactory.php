<?php

namespace Database\Factories;

use App\Enums\AccessTokenActivationStatus;
use App\Models\AccessToken;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccessTokenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AccessToken::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $accessToken = AccessToken::generateToken();

        return [
            'name' => $this->faker->name,
            'access_token' => $accessToken,
            'short_access_token' => substr($accessToken, 0, AccessToken::SHORT_TOKEN_LENGTH),
            'activation_status' => AccessTokenActivationStatus::NotActivated,
        ];
    }
}
