<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'data_admin';
    protected $fillable = ['nama_depan', 'nama_belakang', 'no_telp', 'alamat', 'user_id'];
}
