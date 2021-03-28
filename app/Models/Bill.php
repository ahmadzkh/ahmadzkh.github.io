<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = 'bills';
    protected $fillable = [
        'id_bill',
        'id_pln',
        'nama',
        'no_telp',
        'golongan',
        'bulan',
        'tahun',
        'first_meter',
        'last_meter',
        'price',
        'checked'
    ];
}
