<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepMedia extends Model
{
        protected $fillable = [
            'step_id',
            'file_path',
            // Tambahkan kolom-kolom lain yang dapat diisi di sini
        ];
    
        // Definisikan relasi dengan model Step jika diperlukan
        public function step()
        {
            return $this->belongsTo(Step::class, 'step_id', 'id');
        } 
}
