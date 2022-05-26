<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $content ='';
        for($i = 0; $i < rand(1,10); $i++)
        {
            $content .= $this->faker->sentence(rand(5,10), true);
        }
        return [
            'content' => $content,
        ];
    }
}
