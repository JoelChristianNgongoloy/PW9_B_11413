<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamBuku extends Model
{
    use HasFactory;
    protected $table = 'pinjam_bukus';
    protected $fillable = [
        'id_buku',
        'id_peminjam',
        'tanggal_pinjam',
        'tanggal_kembali',
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku', 'id_buku');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_penerbit');
    }
}
