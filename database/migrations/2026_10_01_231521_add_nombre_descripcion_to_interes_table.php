<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('interes', function (Blueprint $table) {
            $table->string('nombre');
            $table->string('descripcion')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('interes', function (Blueprint $table) {
            $table->dropColumn(['nombre', 'descripcion']);
        });
    }
};