<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    use HasFactory;
    protected $fillable = ['fuel_type'];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
