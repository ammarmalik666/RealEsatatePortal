<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = "projects";
    protected $fillable = [
        'name',
        'property_id',
        'project_status',
        'image_title',
        'image',
        'slug',
        'url',
        'status'
    ];
}
