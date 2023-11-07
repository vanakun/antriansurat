<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $fillable = ['tahap', 'nama', 'keterangan', 'project_id', 'user_id', 'status'];

    public function project()
    {
        return $this->belongsToMany(Project::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function experts()
    {
        return $this->belongsToMany(User::class, 'step_expert', 'step_id', 'expert_id');
    }
}
