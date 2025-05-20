<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    
    protected $table = 'workouts';

    protected $fillable = [
        'title',
        'description',
        'duration', 
        'user_id',  
    ];

    
    public $timestamps = true;

    /**
     * A workout belongs to a user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A workout has many exercises (many-to-many)
     */
    public function exercises()
    {
        return $this->belongsToMany(Exercises::class, 'exercise_workout');
    }
}
