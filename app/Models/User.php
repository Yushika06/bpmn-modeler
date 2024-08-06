<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password', 'profile_picture', 'company_id', 'position_id', 'whatsapp_number', 'address_detail_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function companySize()
    {
        return $this->belongsTo(CompanySize::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function addressDetail()
    {
        return $this->belongsTo(AddressDetail::class, 'address_details_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function socialite()
    {
        return $this->hasMany(Socialite::class);
    }
}
