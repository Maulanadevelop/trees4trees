<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    use HasFactory;
    protected $fillable = [
        'farmer_no',
        'land_no',
        'latitude',
        'longitude',
        'description',
        'land_area',
    ];

    public static function getAll()
    {
        return self::all();
    }
}
