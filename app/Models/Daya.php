<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daya extends Model
{
    use HasFactory;
    protected $table = 'daya_pelanggan';
    protected $fillable = ['nama', 'golongan', 'id_pln'];
}
