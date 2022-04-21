<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
       protected $table = 'pengguna';
       protected $fillable = [
        'nama',
        'perusahaan',
        'alamat',
        'jabatan',
        'hp',
        'jadwal_datang',
        'status',
        'e-tiket',
      ];
    
}
