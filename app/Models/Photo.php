<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url','photoable_type', 'photoable_id'];

    public function photoable()
    {
        return $this->morphTo();
    }
}
