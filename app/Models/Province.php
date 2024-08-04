<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function cities()
    {
        return $this->hasMany(City::class);
    }
    public function address_details()
    {
        return $this->hasMany(AddressDetail::class);
    }
}
