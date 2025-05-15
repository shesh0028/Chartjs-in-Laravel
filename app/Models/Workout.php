<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    // Table name (optional if plural)
    protected $table = 'workouts';

    // Mass assignable fields
    protected $fillable = [
        'user_id',      
        'name',         
        'description',  
        'date',         
    ];

    /**
     * A workout belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A workout has many workout logs (records of exercises done).
     */
    public function workoutLogs()
    {
        return $this->hasMany(WorkoutLog::class);
    }

    /**
     * Many-to-many relationship with exercises via pivot table workout_exercise.
     */
    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'workout_exercise');
    }
}
