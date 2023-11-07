<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $daftarNamaJalan = [
            'Jalan Sudirman', 
            'Jalan Thamrin', 
            'Jalan Pemuda', 
            'Jalan Merdeka', 
            'Jalan Subang',
            'Jalan Merak',
            'Jalan Perak',
            'Jalan Gatot Subroto', 
            'Jalan A. Yani', 
            'Jalan Ahmad Yani', 
            'Jalan Imam Bonjol', 
            'Jalan Diponegoro', 
            'Jalan Gajah Mada', 
            'Jalan WR. Supratman', 
            'Jalan Jendral Sudirman', 
            'Jalan Jendral Thamrin', 
            'Jalan Jendral Ahmad Yani', 
            'Jalan Jendral Gatot Subroto', 
            'Jalan Jendral Sudirman', 
        ];
        return [
            'nama' => $this->faker->randomElement($daftarNamaJalan), // Misalnya, judul acak dengan 3 kata
            'image' => '202310280044jalan-beton2-min-800x445.png',
            'lokasi' => $this->faker->city(), // Menggunakan nama kota acak
            'status' => 'active', // Status acak
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
