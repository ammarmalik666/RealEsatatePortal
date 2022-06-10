<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    use HasFactory;
    protected $table = "investors";
    protected $fillable = [
        'first_name', 'last_name', 'username', 'password', 'profile_pic', 'cell_phone', 'landline_phone', 'address_line_1', 'address_line_2', 'city', 'state', 'zip', 'property', 'status'
    ];
}
