<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ekitaldiak', function (Blueprint $table) {
            $table->string('irudia')->nullable();
            $table->unsignedInteger('edukiera')->default(300);
            $table->string('aretoa')->default('Areto nagusia');
        });
    }

    public function down(): void
    {
        Schema::table('ekitaldiak', function (Blueprint $table) {
            $table->dropColumn(['irudia', 'edukiera', 'aretoa']);
        });
    }
};
