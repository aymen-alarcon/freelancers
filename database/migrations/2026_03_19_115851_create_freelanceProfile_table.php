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
        Schema::create('FreelanceProfile', function (Blueprint $table) {
            $table->id();
            $table->string('competences');
            $table->float('tarif_journalier');
            $table->string('portfolio');
            $table->string('experience');
            $table->boolean('disponibilite');
            $table->float('evaluation_moyenne');
            $table->foreignId("user_id")
                    ->constrained("users")
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
        Schema::dropIfExists('FreelanceProfile');
    }
};
