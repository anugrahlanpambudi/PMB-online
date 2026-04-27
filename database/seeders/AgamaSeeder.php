<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agama; // Pastikan model Agama sudah ada

class AgamaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama' => 'Islam'],
            ['nama' => 'Kristen'],
            ['nama' => 'Katolik'],
            ['nama' => 'Hindu'],
            ['nama' => 'Budha'],
            ['nama' => 'Khonghucu'],
            ['nama' => 'Lainnya'],
        ];

        foreach ($data as $item) {
            // updateOrCreate digunakan agar jika dijalankan 2x, data tidak duplikat
            Agama::updateOrCreate(['nama' => $item['nama']], $item);
        }
    }
}