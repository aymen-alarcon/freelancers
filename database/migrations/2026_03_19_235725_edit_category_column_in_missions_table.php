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
        Schema::table('missions', function (Blueprint $table) {
            $table->dropConstrainedForeignId("category_id");
            $table->enum("category", ["Développement Web", "Développement Mobile", "Développement Desktop", "Full-Stack", "DevOps", "UI/UX"])->after("status");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('missions', function (Blueprint $table) {
            $table->dropColumn("category");
            $table->foreignId("category_id")
                    ->constrained("categories")
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
        });
    }
};
