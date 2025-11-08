<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'food_name',
        'calories',
        'date',
        'time',
    ];

    protected $casts = [
        'calories' => 'decimal:2',
        'date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}