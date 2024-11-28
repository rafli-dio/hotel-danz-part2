<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    protected $table = 'reservasis';

    protected $fillable = [
        'tamu_id',
        'kamar_id',
        'kota',
        'tanggal_check_in',
        'tanggal_check_out',
        'jumlah_orang',
        'total_harga'
    ];

    public function tamu()
    {
        return $this->belongsTo(Tamu::class);
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
}
