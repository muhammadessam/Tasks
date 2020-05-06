<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'priority'];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
