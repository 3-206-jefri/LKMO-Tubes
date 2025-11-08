<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method static Builder pending()
 * @method static Builder completed()
 */
class WorkoutSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'activity_type',
        'target_goal',
        'scheduled_at',
        'status',
        'completed_at',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include pending workouts.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePending(Builder $query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope a query to only include completed workouts.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCompleted(Builder $query)
    {
        return $query->where('status', 'completed');
    }

    /**
     * Mark the workout as completed.
     *
     * @return bool
     */
    public function markAsCompleted()
    {
        return $this->update([
            'status' => 'completed',
            'completed_at' => now(),
        ]);
    }
}