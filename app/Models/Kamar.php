<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;
    protected $table = 'kamars'; 
    protected $fillable = ['nomor_kamar', 'tipe_kamar_id', 'status_tersedia'];

    public function tipeKamar()
    {
        return $this->belongsTo(TipeKamar::class, 'tipe_kamar_id', 'id');
    }
}
