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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string("rating");
            $table->string("comment");
            $table->foreignId("author_id")
                    ->constrained("users")
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
            $table->foreignId("target_id")
                    ->constrained("users")
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
            $table->foreignId("mission_id")
                    ->constrained("missions")
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
