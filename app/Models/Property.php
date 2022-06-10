<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $table = "properties";
    protected $fillable = [
        'name',
        'address',
        'city',
        'state',
        'zip',
        'bedrooms',
        'bathrooms',
        'square_footage',
        'lot_acreage',
        'cars_in_garage',
        'pictures',
        'date_acquired',
        'acquisition_price',
        'date_completed',
        'after_renovation_value',
        'sale_date',
        'sale_price',
        'property_status',
        'slug',
        'status'
    ];
}
