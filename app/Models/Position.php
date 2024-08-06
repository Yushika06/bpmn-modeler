<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = ['name', 'company_id'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function companies()
    {
        return $this->belongsTo(Company::class);
    }
}
