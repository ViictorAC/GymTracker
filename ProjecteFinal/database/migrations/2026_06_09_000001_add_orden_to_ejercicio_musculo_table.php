<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ejercicio_musculo', function (Blueprint $table) {
            $table->unsignedTinyInteger('orden')->default(0)->after('musculo_id');
        });
    }

    public function down(): void
    {
        Schema::table('ejercicio_musculo', function (Blueprint $table) {
            $table->dropColumn('orden');
        });
    }
};
