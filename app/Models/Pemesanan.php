<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'penumpang';
    
    protected $fillable = [
        'user_id',
        'nama_penumpang',
        'phone',
        'jadwal_id',
        'status_bayar' 
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke jadwal
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
}
