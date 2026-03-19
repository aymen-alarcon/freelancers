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
        Schema::table('candidatures', function (Blueprint $table) {
            $table->string("lettre_de_motivation")->after("id");
            $table->string("tarif_propose")->after("lettre_de_motivation");
            $table->string("status")->after("tarif_propose");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('candidatures', function (Blueprint $table) {
            $table->string("lettre_de_motivation")->after("id");
            $table->string("tarif_propose")->after("lettre_de_motivation");
            $table->string("status")->after("tarif_propose");
        });
    }
};
