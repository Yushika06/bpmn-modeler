<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modeler extends Model
{
    use HasFactory;
    protected $fillable = ['bpmn', 'project_id'];

    public function project(){
        return $this->hasOne(Project::class);
    }
}
