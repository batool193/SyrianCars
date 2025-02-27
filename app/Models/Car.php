<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'brand_id',
        'model_id',
        'color_id',
        'gear_id',
        'city_id',
        'fuel_id',
        'production_year',
        'engine_power',
        'condition',
        'mileage',
        'price',
        'description',
        'plate_number',
        'is_available'
    ];

    protected $casts = [
        'production_year' => 'integer',
        'is_available' => 'boolean',
        'price' => 'decimal:2'
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}
public function ratedByUsers()
{
    return $this->belongsToMany(User::class, 'ratings')->withTimestamps();
}
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function model()
    {
        return $this->belongsTo(CarModel::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function gear()
    {
        return $this->belongsTo(Gear::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function fuel()
    {
        return $this->belongsTo(Fuel::class);
    }
    public function photos()
    {
        return $this->morphMany(Photo::class, 'photoable');
    }
}
