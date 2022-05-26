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
        $links[] = ['https://cdn.pixabay.com/photo/2022/05/16/19/14/road-7201023_960_720.jpg',
        'https://cdn.pixabay.com/photo/2022/04/19/20/43/daffodil-7143756__340.jpg',
        'https://cdn.pixabay.com/photo/2022/03/23/17/16/waterfall-7087571__340.jpg',
        'https://cdn.pixabay.com/photo/2018/07/13/10/20/kittens-3535404__340.jpg',
        'https://cdn.pixabay.com/photo/2017/02/15/12/12/cat-2068462__340.jpg',
        'https://cdn.pixabay.com/photo/2017/02/20/18/03/cat-2083492__340.jpg'.
        'https://cdn.pixabay.com/photo/2016/06/14/00/14/cat-1455468__340.jpg',
        'https://cdn.pixabay.com/photo/2017/07/25/01/22/cat-2536662__340.jpg',
        'https://cdn.pixabay.com/photo/2013/07/13/01/12/witch-155291__340.png',
        'https://cdn.pixabay.com/photo/2017/04/30/18/33/kittens-2273598__340.jpg'];
        $content ='';
        for($i = 0; $i < rand(50,100); $i++)
        {
            $content .= '<p>'.$this->faker->sentence(rand(5,10), true).'</p>';
        }
        return [
            'title' => $this->faker->sentence(rand(5,10)),
            'content' => $content,
            'main_img_path' => $links[rand(0,($links->count()-1))],
            'main_img_name' => $this->faker->name(),
        ];
    }
}
