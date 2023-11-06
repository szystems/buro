<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'category_course_id');
    }
}
