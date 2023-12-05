<?php
// app/Models/JurnalUmum.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JurnalUmum extends Model
{
    protected $table = 'jurnal_umum';

    protected $fillable = [
        'tanggal', 'bukti_transaksi', 'keterangan', 'kode_app_id','jurnal_id', 'debet', 'kredit',
    ];

    // Relationship with KodeApp model
    public function kodeApp()
    {
        return $this->belongsTo(KodeApp::class, 'kode_app_id');
    }

    // Relationship with Jurnal model
    public function jurnal()
    {
        return $this->belongsTo(Jurnal::class, 'jurnal_id');
    }
}
