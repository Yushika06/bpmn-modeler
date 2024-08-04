<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'company_size_id'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function companySize()
    {
        return $this->hasMany(CompanySize::class);
    }
    public function positions()
    {
        return $this->hasMany(Position::class);
    }
}
