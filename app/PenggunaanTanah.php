<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenggunaanTanah extends Model
{
    protected $table = 'penggunaan_tanah';

    protected $fillable = ['uraian_penggunaan_tanah', 'keterangan_penggunaan_tanah'];
}
