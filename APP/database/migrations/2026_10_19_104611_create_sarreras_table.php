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
        Schema::create('sarreras', function (Blueprint $table) {
            $table->id();

            $table->foreignId('erabiltzailea_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('eserlekua_id')
                ->constrained('eserlekuas')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('saioa_id')
                ->constrained('saioas')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->decimal('prezioa', 5, 2);
            $table->date('erosketa_data');
            $table->string('egoera', 15)->nullable();
            $table->timestamps();

            $table->unique(['eserlekua_id', 'saioa_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sarreras');
    }
};
