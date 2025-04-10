<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'pembayaranid';
    protected $fillable = [
        'kursusid',
        'tujuan_tf',
        'tanggal_tf',
        'jumlah_pembayaran'
    ];

    // Relasi: Pembayaran terkait dengan satu Kursus
    public function kursus()
    {
        return $this->belongsTo(kursus::class, 'kursusid', 'kursusid');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id', 'user_id');
    }
}
