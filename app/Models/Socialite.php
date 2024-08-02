<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socialite extends Model
{
    use HasFactory;
    protected $table = "socialite";

    protected $fillable = [
        'user_id',
        'provider_id',
        'provider_name',
        'provider_refresh_token',
        'profile_picture',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
