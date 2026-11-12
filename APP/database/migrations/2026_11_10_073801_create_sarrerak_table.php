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
        Schema::create('sarrerak', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('ekitaldia_id')
                ->constrained('ekitaldiak')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->unsignedInteger('kopurua');
            $table->decimal('prezio_totala', 5, 2);
            $table->string('kodigoa')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sarrerak');
    }
};
