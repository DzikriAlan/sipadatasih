<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    protected $table = 'permohonan';
    protected $primaryKey = 'id_permohonan';

    protected $fillable = [
        'id_layanan', 'no_sp', 'no_register', 'tgl_sp', 'alamat_domisili', 'desa_domisili', 'kecamatan_domisili',
        'kabupaten_domisili', 'provinsi_domisili', 'rt_domisili', 'rw_domisili', 'keterangan', 'penggunaan',
        'is_pendatang', 'status', 'nik', 'id_user', 'alasan_tolak'
    ];

    // protected $attributes = [
    //     'status' => 'tidak'
    // ];

    // Relasi N-1 dengan pengguna
    public function layanan()
    {
        return $this->belongsTo('App\Pelayanan', 'id_layanan');
    }

    public function penduduk()
    {
        return $this->belongsTo('App\Penduduk', 'nik');
    }

    public function pengguna()
    {
        return $this->belongsTo('App\Pengguna', 'id_user');
    }
}
