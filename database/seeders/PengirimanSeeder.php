<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengirimanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengiriman')->insert([
            'kode'      => '123456789',
            'isi'       => 'Elektronik',
            'tujuan'    => 'Surabaya',
            'berat'     => '10'
        ]);
    }
}
