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
    Schema::create('entreno_sets', function (Blueprint $table) {
        $table->id();
        $table->foreignId('entreno_id')->constrained('entrenos')->cascadeOnDelete();
        $table->foreignId('ejercicio_id')->constrained('ejercicios')->cascadeOnDelete();
        $table->tinyInteger('set_numero');
        $table->float('peso')->nullable()->comment('En kg');
        $table->integer('reps');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entreno_sets');
    }
};
