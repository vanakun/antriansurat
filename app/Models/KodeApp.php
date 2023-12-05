<?php

// app/JurnalUmum.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeApp extends Model
{
    protected $table = 'kode_app';
    protected $fillable = ['kode', 'nama'];

    // Relasi One-to-Many dengan JurnalUmum
    public function jurnalUmum()
    {
        return $this->hasMany(JurnalUmum::class, 'kode_akun', 'kode');
    }
}
