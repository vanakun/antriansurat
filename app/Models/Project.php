<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 
        'image', 
        'lokasi', 
        'status'
    ];
    public function steps()
    {
        return $this->hasMany(Steps::class);
    }
}