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
        Schema::create('eserlekuas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aretoa_id')
                ->constrained('aretoas')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->unsignedInteger('ilara');
            $table->unsignedInteger('zenbakia');

            $table->timestamps();

            $table->unique(['aretoa_id', 'ilara', 'zenbakia']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eserlekuas');
    }
};
