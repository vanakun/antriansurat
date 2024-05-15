<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPengawasanPemilu extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'tanggal',
        'nama',
        'perihal',
        'tujuan',
        'jenis_surat',
        'keterangan',
        'kota',
        'substantif',
        'no_surat', 
        'user_id',
        'j_surat',// Tambahkan kolom no_surat ke daftar fillable
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Method untuk membuat nomor surat
    
}
