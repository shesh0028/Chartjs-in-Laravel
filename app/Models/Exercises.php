<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercises extends Model
{
    
    protected $table = 'exercises';

    
    protected $fillable = [
        'name',
        'description',
        'difficulty',
        'category_id',
    ];

    
    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

        public function tags()
    {
        return $this->belongsToMany(Tag::class, 'exercise_tag');
    }

    
    public function getDifficultyAttribute($value)
    {
        return ucfirst($value);
    }
}
