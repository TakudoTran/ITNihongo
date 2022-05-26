<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class rateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::all();
        $values = [-1, 1];
        return [
            'user_id' => $users[rand(0,($users->count()-1))]->id,
            'value' => $values[rand(0,1)]
        ];
    }
}
