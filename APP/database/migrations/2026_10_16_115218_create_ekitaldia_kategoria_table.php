<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ekitaldia_kategoria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ekitaldia_id')
                ->constrained('ekitaldias')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('kategoria_id')
                ->constrained('kategorias')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->unique(['ekitaldia_id', 'kategoria_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ekitaldia_kategoria');
    }
};
