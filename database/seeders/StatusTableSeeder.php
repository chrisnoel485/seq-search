<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Status::create([
            'nama' => 'Dipinjam',
            'deskripsi' => 'Aset Sedang Dipinjam',
        ]);
        Status::create([
            'nama' => 'Tidak Dipinjam',
            'deskripsi' => 'Aset Sedang Tidak Dipinjam',
        ]);
    }
}
