<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_barang')->insert([
            [
            'kategori' => 'makanan',
            ],
            [
                'kategori' => 'minuman'
            ]

        ]);
    }
}
