<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name'];
    protected $with = ['tasks'];

    public function tasks()
    {
        return $this->hasMany(Task::class, 'project_id', 'id')->orderBy('priority');
    }
}
