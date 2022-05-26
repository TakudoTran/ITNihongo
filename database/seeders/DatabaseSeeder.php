<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\SharingPost;
use Illuminate\Support\Facades\Hash;
use App\Models\PostComment;
use App\Models\rate;
// use App\Models\rate;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make(123456) ,
            'remember_token' => '1234567890',
        ]);
        $this->call(CategorySeeder::class);
        $this->call(UserSeeder::class);
        $user = User::all();
        $post = SharingPost::all()->each(function($post) use($user) {
            PostComment::factory(rand(1, 10))->create([
                'post_id' => $post->id,
                'user_id' => $user[rand(0,($user->count()-1))]->id,
            ]);
            rate::factory(rand(1, $user->count()))->create([
                'post_id' => $post->id,
            ]);
        });
    }
}
