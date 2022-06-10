<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RenovationGallery extends Model
{
    use HasFactory;
    protected $table = "renovation_gallery";
    protected $fillable = [
        'title', 'image', 'description','slug', 'url', 'status'
    ];
}
