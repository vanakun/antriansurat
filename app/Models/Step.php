<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $fillable = ['tahap', 'nama', 'keterangan', 'project_id', 'user_id'];

    public function project()
    {
        return $this->belongsToMany(Project::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
