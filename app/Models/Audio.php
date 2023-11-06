<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BlongsTo;

class Audio extends Model
{
    use HasFactory;

    protected $table = 'audios';

    protected $primaryKey='id';

    public $timestamps=true;

    protected $fillable = [
        'course_id',
        'name',
        'description',
        'file_audio',
    ];

    public function courses(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
