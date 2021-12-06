<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'    => 'Thoriq Harizul Ahsan',
            'email'    => 'thariq@t.com',
            'password'    => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
    }
}
