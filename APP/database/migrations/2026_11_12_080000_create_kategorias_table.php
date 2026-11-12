<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kategorias', function (Blueprint $table) {
            $table->id();
            $table->string('izena', 50)->unique();
            $table->timestamps();
        });

        Schema::table('ekitaldiak', function (Blueprint $table) {
            $table->foreignId('kategoria_id')
                ->nullable()
                ->after('kategoria')
                ->constrained('kategorias')
                ->cascadeOnUpdate()
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('ekitaldiak', function (Blueprint $table) {
            $table->dropConstrainedForeignId('kategoria_id');
        });

        Schema::dropIfExists('kategorias');
    }
};
