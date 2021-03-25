<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'data_pelanggan';
    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'no_telp',
        'no_pln',
        'golongan',
        'kelurahan',
        'kecamatan',
        'kota_kab',
        'alamat',
        'kode_pos',
        'user_id'
    ];
}
