<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;
    protected $table = 'tamus'; 

    protected $fillable = [
        'nama_panjang',
        'email',
        'alamat',
        'nomor_telepon',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
    ];
}
