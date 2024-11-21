<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeKamar extends Model
{
    use HasFactory;
    protected $table = 'tipe_kamars';

    protected $fillable = [
        'nama_tipe_kamar',
        'harga_kamar',
        'deskripsi_kamar',
        'gambar_kamar',
    ];
}
