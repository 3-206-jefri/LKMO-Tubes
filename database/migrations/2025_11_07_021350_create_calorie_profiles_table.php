<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('calorie_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('age');
            $table->enum('gender', ['male', 'female']);
            $table->decimal('height', 5, 2); // in cm
            $table->decimal('weight', 5, 2); // in kg
            $table->enum('activity_level', [
                'sedentary',
                'light',
                'moderate',
                'very_active',
                'extra_active'
            ]);
            $table->decimal('bmr', 8, 2);
            $table->decimal('tdee', 8, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('calorie_profiles');
    }
};