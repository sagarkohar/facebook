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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->string("user");
            $table->unsignedBigInteger("postId");
            $table->unsignedBigInteger("likes");
            $table->timestamps();

            $table->foreign("postId")->references("id")->on("posts")->onDelete("cascade");
            $table->foreign("user")->references("username")->on("registeration")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
