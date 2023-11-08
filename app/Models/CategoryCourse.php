<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryCourse extends Model
{
    use HasFactory;

    protected $table = 'category_courses';

    protected $primaryKey='id';

    public $timestamps=true;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'show',
        'popular',
        'image',
        'status',
    ];
}
