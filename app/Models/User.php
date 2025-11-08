<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

/**
 * @property int $id
 * @property string $username
 * @property string|null $nickname
 * @property string $email
 * @property \Carbon\Carbon|null $date_of_birth
 * @property float|null $height
 * @property float|null $weight
 * @property string|null $gender
 * @property string|null $profile_photo
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\WorkoutSchedule[] $workoutSchedules
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'nickname',
        'email',
        'password',
        'date_of_birth',
        'height',
        'weight',
        'gender',
        'profile_photo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'date_of_birth' => 'date',
            'height' => 'decimal:2',
            'weight' => 'decimal:2',
        ];
    }

    /**
     * Get the workout schedules for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workoutSchedules()
    {
        return $this->hasMany(WorkoutSchedule::class);
    }

    /**
     * Get the profile photo URL attribute.
     * DIPERBAIKI: Gunakan asset() langsung karena file ada di public/storage
     */
    public function getProfilePhotoUrlAttribute()
    {
        if ($this->profile_photo) {
            // Cek apakah file benar-benar ada
            $filePath = public_path($this->profile_photo);
            if (file_exists($filePath)) {
                return asset($this->profile_photo);
            }
        }
        
        // Default avatar jika tidak ada foto
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->username ?? 'User') . '&size=200&background=f97316&color=fff&bold=true';
    }

    public function getAgeAttribute()
    {
        if (!$this->date_of_birth) {
            return null;
        }
        return Carbon::parse($this->date_of_birth)->age;
    }

    public function getBmiAttribute()
    {
        if (!$this->height || !$this->weight) {
            return null;
        }
        $heightInMeters = $this->height / 100;
        return round($this->weight / ($heightInMeters * $heightInMeters), 2);
    }

    public function calorieProfile()
    {
        return $this->hasOne(CalorieProfile::class)->latestOfMany();
    }

    public function foodLogs()
    {
        return $this->hasMany(FoodLog::class);
    }

    public function todayFoodLogs()
    {
        return $this->hasMany(FoodLog::class)->whereDate('date', today());
    }

    public function getTodayCaloriesAttribute()
    {
        return $this->todayFoodLogs()->sum('calories');
    }

    public function getRemainingCaloriesAttribute()
    {
        if (!$this->calorieProfile) {
            return null;
        }
        return $this->calorieProfile->tdee - $this->today_calories;
    }
}