<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default credentials
        \App\Models\User::insert([
            [ 
            'name' => 'Left4code',
            'email' => 'midone@left4code.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'gender' => 'male',
            'role' => 'User',
            'active' => 1,
            'remember_token' => Str::random(10)
            ]
        ]);
            
        \App\Models\User::insert([
            [ 
            'name' => 'Sumanto',
            'email' => 'example@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$l9.Y.RsGZEDR2IbMWPeHgukmdcP7ZjqnJQRPhU4g/CYiVRhygn946', // qwerty123
            'gender' => 'male',
            'phone' => '082264148811',
            'active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            'remember_token' => Str::random(10)
            ]
        ]);
                
       
        

    }
}
