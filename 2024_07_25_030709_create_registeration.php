<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registeration', function (Blueprint $table) {
            $table->id();
            $table->string('username',50)->unique();
            $table->string('password');
            $table->string('profile_picture')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->json('hobbies')->nullable();
            $table->date("dob");
            $table->enum('gender', ['male', 'female', 'other']);
            $table->text("status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registeration');
    }
};
