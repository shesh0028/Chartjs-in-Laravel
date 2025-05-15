<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkoutLog extends Model
{
    protected $table = 'workout_logs';

    protected $fillable = [
        'user_id',      
        'workout_id',   
        'exercise_id',  
        'sets',         
        'reps',         
        'weight',       
        'duration',     
        'notes',        
        'performed_at', 
    ];

    /**
     * The user who performed this workout log.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The workout this log is related to.
     */
    public function workout()
    {
        return $this->belongsTo(Workout::class);
    }

    /**
     * The exercise that was performed.
     */
    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}
