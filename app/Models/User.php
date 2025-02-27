<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens,HasRoles;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'city_id',
        'birthdate'
    ];

    protected $hidden = ['password'];
    protected $casts = [
        'password' => 'hashed',
        'birthdate' => 'date',
    ];
    public function cars()
    {
        return $this->hasMany(Car::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function ratedCars()
    {
        return $this->belongsToMany(Car::class, 'ratings')->withTimestamps();
    }
    public function socialAccounts()
    {
        return $this->hasMany(SocialAccount::class);
    }

    public function photos()
    {
        return $this->morphOne(Photo::class, 'photoable');
    }
}
