<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalorieProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'age',
        'gender',
        'height',
        'weight',
        'activity_level',
        'bmr',
        'tdee',
    ];

    protected $casts = [
        'height' => 'decimal:2',
        'weight' => 'decimal:2',
        'bmr' => 'decimal:2',
        'tdee' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function calculateBMR($gender, $weight, $height, $age)
    {
        // Mifflin-St Jeor Equation
        if ($gender === 'male') {
            return (10 * $weight) + (6.25 * $height) - (5 * $age) + 5;
        } else {
            return (10 * $weight) + (6.25 * $height) - (5 * $age) - 161;
        }
    }

    public static function calculateTDEE($bmr, $activityLevel)
    {
        $multipliers = [
            'sedentary' => 1.2,      // Little or no exercise
            'light' => 1.375,        // Exercise 1-3 times/week
            'moderate' => 1.55,      // Exercise 4-5 times/week
            'very_active' => 1.725,  // Daily exercise or intense exercise 3-4 times/week
            'extra_active' => 1.9,   // Intense exercise 6-7 times a week
        ];

        return $bmr * ($multipliers[$activityLevel] ?? 1.2);
    }
}