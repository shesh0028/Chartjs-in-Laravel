<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    
    protected $table = 'exercises';

    // Fillable fields (which can be mass assigned)
    protected $fillable = [
        'name',      
        'type',        
        'description', 
        'muscle_group' 
    ];

    /**
     * An exercise can belong to many workouts (Many-to-Many).
     * Assuming you have pivot table workout_exercise for this relation.
     */
    public function workouts()
    {
        return $this->belongsToMany(Workout::class, 'workout_exercise');
    }

    /**
     * An exercise may have many workout logs (records when performed).
     */
    public function workoutLogs()
    {
        return $this->hasMany(WorkoutLog::class);
    }
}
