<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';

    protected $fillable = [
        'nama_travel',
        'asal',
        'tujuan',
        'tanggal_berangkat',
        'jam_berangkat',
        'kapasitas',
        'harga_tiket'
    ];

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class);
    }
}
