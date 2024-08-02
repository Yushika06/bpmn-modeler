<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanySize extends Model
{
    protected $fillable = ['size'];

    public function companies()
    {
        return $this->belongsTo(Company::class);
    }
}
