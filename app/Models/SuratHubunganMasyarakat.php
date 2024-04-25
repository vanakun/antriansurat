<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratHubunganMasyarakat extends Model
{
    use HasFactory;

    protected $fillable = [
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
        'j_surat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
