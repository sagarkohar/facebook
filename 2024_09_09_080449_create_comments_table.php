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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("postId");
            $table->text("comment");
            $table->string("user");
           
            $table->timestamps();

            // to make it foreign

            $table->foreign("postId")->references("id")->on("posts")->onDelete("cascade");
            $table->foreign("user")->references("username")->on("registeration")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
