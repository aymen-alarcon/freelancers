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
        Schema::create('mission_tech', function (Blueprint $table) {
            $table->id();
            $table->foreignId("mission_id")
                    ->constrained("missions")
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
            $table->foreignId("technology_id")
                    ->constrained("technologies")
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
        Schema::dropIfExists('mission_tech');
    }
};
