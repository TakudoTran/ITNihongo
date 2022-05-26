<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SharingPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $content ='';
        for($i = 0; $i < rand(6,20); $i++)
        {
            $content .= '<p>'.$this->faker->sentence(rand(5,10), true).'</>';
        }
        return [
            'title' => $this->faker->sentence(rand(5,20)),
            'content' => $this->faker->unique()->safeEmail(),
            'main_img_path' => $this->faker->url,
            'main_img_name' => $this->faker->name(),
        ];
    }
}
