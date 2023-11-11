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
            'role' => 'Admin',
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
                
        // Fake users
        User::factory()->times(50)->create();
        \App\Models\Project::insert([
            [ 
                'nama' => 'Jalan Menganti',
                'image' => '202310272305Pembuatan-Jalan-Beton.png',
                'lokasi' => 'Gresik',
                'keterangan' => 'Jalan Menganti ini akan dibangun dengan panjang blablablabla',
                'status' => 'active', // password
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        \App\Models\Project::insert([
            [ 
                'nama' => 'Jalan Bratang',
                'image' => '202310280044jalan-beton2-min-800x445.png',
                'lokasi' => 'Surabaya',
                'keterangan' => 'Jalan Bratang ini akan dibangun dengan panjang blablablabla',
                'status' => 'active', // password
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        \App\Models\Project::insert([
            [ 
                'nama' => 'Jalan Bringkang',
                'image' => '202310272305Pembuatan-Jalan-Beton.png',
                'lokasi' => 'Gresik',
                'keterangan' => 'Jalan Bringkang ini akan dibangun dengan panjang blablablabla',
                'status' => 'active', // password
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        \App\Models\Project::insert([
            [ 
                'nama' => 'Jalan Hayam Wuruk',
                'image' => '202310280044jalan-beton2-min-800x445.png',
                'lokasi' => 'Jakarta',
                'keterangan' => 'Jalan Hayam Wuruk ini akan dibangun dengan panjang blablablabla',
                'status' => 'active', // password
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        \App\Models\Step::insert([
            [ 
                'tahap' => '1',
                'nama' => 'Uji Tanah',
                'keterangan' => 'Pengujian lorem ipsum dipsum',
                'project_id' => '1', // password
                'user_id' => '2',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        \App\Models\Step::insert([
            [ 
                'tahap' => '2',
                'nama' => 'Perhitungan material',
                'keterangan' => 'Dilakukan perhitungan pada bahan yang akan digunakan',
                'project_id' => '1', // password
                'user_id' => '11',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
        

    }
}
