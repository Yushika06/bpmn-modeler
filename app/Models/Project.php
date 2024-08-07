<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'user_id', 'modeler_id', 'status_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function modeler(){
        return $this->hasOne(Modeler::class);
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }
}
