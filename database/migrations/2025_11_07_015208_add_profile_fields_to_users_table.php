<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nickname')->nullable()->after('username');
            $table->date('date_of_birth')->nullable()->after('email');
            $table->decimal('height', 5, 2)->nullable()->after('date_of_birth')->comment('in cm');
            $table->decimal('weight', 5, 2)->nullable()->after('height')->comment('in kg');
            $table->enum('gender', ['male', 'female', 'other'])->nullable()->after('weight');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['nickname', 'date_of_birth', 'height', 'weight', 'gender']);
        });
    }
};