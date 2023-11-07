<?php

use Illuminate\Database\Seeder;

class FasilitasPeribadatanTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'jenis_fasilitas_peribadatan' => 'Masjid', 
                'keterangan_fasilitas_peribadatan' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'jenis_fasilitas_peribadatan' => 'Mushola', 
                'keterangan_fasilitas_peribadatan' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'jenis_fasilitas_peribadatan' => 'Pura', 
                'keterangan_fasilitas_peribadatan' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'jenis_fasilitas_peribadatan' => 'Gereja', 
                'keterangan_fasilitas_peribadatan' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('fasilitas_peribadatan')->insert($data);
        
        $this->command->info('Berhasil Menambahkan 4 baris di tabel fasilitas_peribadatan');
    }
}
