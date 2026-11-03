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
        Schema::create('saioas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aretoa_id')
                ->constrained('aretoas')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('ekitaldia_id')
                ->constrained('ekitaldias')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->date('data');
            $table->time('ordua');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saioas');
    }
};
