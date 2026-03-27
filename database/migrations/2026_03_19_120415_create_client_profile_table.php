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
        Schema::create('clients_profile', function (Blueprint $table) {
            $table->id();
            $table->string("entreprise")->nullable();
            $table->string("description")->nullable();
            $table->string("historique_missions")->nullable();
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
        Schema::dropIfExists('clients_profile');
    }
};
