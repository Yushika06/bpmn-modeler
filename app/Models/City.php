<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function addressDetails()
    {
        return $this->hasMany(AddressDetail::class);
    }
}
