<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\SharingPost;
use App\Models\User;
use App\Models\Category;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = Category::all();
        User::factory(20)->create()->each(function($user) use($categories) {
            SharingPost::factory(rand(1, 10))->create([
                'user_id' => $user->id,
                'category_id' => $categories[rand(0,($categories->count()-1))]->id
            ]);
        });
    }
}
