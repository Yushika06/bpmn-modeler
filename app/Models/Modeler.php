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
    public function getBpmnContentAttribute()
    {
        $filePath = public_path('bpmn/' . $this->bpmn);
        return file_exists($filePath) ? file_get_contents($filePath) : '';
    }
}
