<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Workout;
use App\Models\Exercise;
use App\Models\WorkoutLog;

class GymSeeder extends Seeder
{
    public function run()
    {
        // Users
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'age' => 28,
            'gender' => 'male',
        ]);

        // Workouts
        $workout = Workout::create([
            'title' => 'Full Body Blast',
            'description' => 'A high-intensity full-body workout.',
            'difficulty' => 'hard',
            'duration' => 45,
        ]);

        // Exercises
        Exercise::insert([
            ['name' => 'Jumping Jacks', 'type' => 'cardio', 'calories_burned_per_minute' => 8],
            ['name' => 'Push Ups', 'type' => 'strength', 'calories_burned_per_minute' => 7],
            ['name' => 'Burpees', 'type' => 'cardio', 'calories_burned_per_minute' => 10],
        ]);

        // Workout Logs
        WorkoutLog::create([
            'user_id' => $user->id,
            'workout_id' => $workout->id,
            'date' => now(),
            'duration' => 45,
            'notes' => 'Very intense, felt great afterward.',
        ]);

        // Add more entries
        User::factory()->count(2)->create();
        Workout::factory()->count(2)->create();
        Exercise::factory()->count(2)->create();
    }
}
