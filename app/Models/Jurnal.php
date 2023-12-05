<?php
// app/Models/JurnalUmum.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    protected $table = 'jurnal';

    protected $fillable = [
        'name', 'date',
    ];
    public function kodeApp()
    {
        return $this->belongsTo(KodeApp::class, 'kode_app_id');
    }

    // Relationship with Jurnal model
    public function jurnalUmumEntries()
    {
        return $this->hasMany(JurnalUmum::class, 'jurnal_id');
    }
    // Menambah relasi dengan model KodeApp
   
}
