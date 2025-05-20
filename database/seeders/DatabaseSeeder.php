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
        // Create 2 users
        $users = User::factory()->count(2)->create();

        // Create 2 workouts
        $workouts = Workout::factory()->count(2)->create();

        // Insert 3 exercises
        Exercise::insert([
            ['name' => 'Jumping Jacks', 'type' => 'cardio', 'calories_burned_per_minute' => 8],
            ['name' => 'Push Ups', 'type' => 'strength', 'calories_burned_per_minute' => 7],
            ['name' => 'Burpees', 'type' => 'cardio', 'calories_burned_per_minute' => 10],
        ]);

        // Create 3 workout logs
        foreach (range(0, 2) as $i) {
            WorkoutLog::create([
                'user_id' => $users[$i % 2]->id,
                'workout_id' => $workouts[$i % 2]->id,
                'date' => now()->subDays($i),
                'duration' => 30 + ($i * 5),
                'notes' => 'Log ' . ($i + 1),
            ]);
        }
    }
}
