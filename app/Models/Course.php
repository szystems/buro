<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BlongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $primaryKey='id';

    public $timestamps=true;

    protected $fillable = [
        'category_course_id',
        'name',
        'slug',
        'description',
        'show',
        'popular',
        'image',
        'file_pdf',
        'status',
    ];

    public function category_courses(): BelongsTo
    {
        return $this->belongsTo(CategoryCourse::class, 'category_course_id', 'id');
    }

    public function videos(): HasMany
    {
        return $this->hasMany(Video::class, 'course_id');
    }

    public function audios(): HasMany
    {
        return $this->hasMany(Audio::class, 'course_id');
    }
}
