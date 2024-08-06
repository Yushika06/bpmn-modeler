<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressDetail extends Model
{
    use HasFactory;

    protected $fillable = ['province_id', 'city_id', 'address'];

    public function cities()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    public function provinces()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
