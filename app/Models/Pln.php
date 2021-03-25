<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pln extends Model
{
    use HasFactory;
    protected $table = 'data_pln';
    protected $fillable = ['nama_depan', 'nama_belakang', 'no_telp', 'alamat', 'user_id'];
}
