<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\SharingPost;
use Illuminate\Support\Facades\Hash;
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
    }
}
