<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratTeknologiInformasi extends Model
{
    use HasFactory;

    protected $table = 'surat_teknologiinformasis';
    
    protected $fillable = [
        'status',
        'tanggal',
        'nama',
        'perihal',
        'tujuan',
        'jenis_surat',
        'keterangan',
        'kota',
        'fasilitatif',
        'no_surat', 
        'user_id',
        'j_surat',// Tambahkan kolom no_surat ke daftar fillable
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function surat()
    {
        return $this->morphTo();
    }
}
