<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'surat_id',
        'surat_type',
    ];

    public $timestamps = false; // Nonaktifkan timestamps

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function surat()
    {
        return $this->morphTo();
    }
    
    
}

