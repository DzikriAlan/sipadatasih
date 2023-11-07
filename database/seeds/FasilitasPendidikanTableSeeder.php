<?php

use Illuminate\Database\Seeder;

class FasilitasPendidikanTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'jenis_fasilitas_pendidikan' => 'Gedung TK', 
                'keterangan_fasilitas_pendidikan' => '3 buah',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'jenis_fasilitas_pendidikan' => 'Gedung SD', 
                'keterangan_fasilitas_pendidikan' => '2 buah',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'jenis_fasilitas_pendidikan' => 'Gedung SLTP', 
                'keterangan_fasilitas_pendidikan' => '2 buah',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'jenis_fasilitas_pendidikan' => 'Gedung SLTA', 
                'keterangan_fasilitas_pendidikan' => '2 buah',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('fasilitas_pendidikan')->insert($data);
        
        $this->command->info('Berhasil Menambahkan 4 baris di tabel fasilitas_pendidikan');
    }
}
