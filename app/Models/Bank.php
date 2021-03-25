<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'data_bank';
    protected $fillable = ['nama_depan', 'nama_belakang', 'no_telp', 'alamat', 'user_id'];
}
