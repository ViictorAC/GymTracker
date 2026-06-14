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
    Schema::create('ejercicio_musculo', function (Blueprint $table) {
        $table->foreignId('ejercicio_id')->constrained('ejercicios')->cascadeOnDelete();
        $table->foreignId('musculo_id')->constrained('musculos')->cascadeOnDelete();
        $table->primary(['ejercicio_id', 'musculo_id']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejercicio_musculo');
    }
};
