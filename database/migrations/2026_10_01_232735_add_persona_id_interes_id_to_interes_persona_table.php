<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('interes_persona', function (Blueprint $table) {
            $table->foreignId('persona_id')
                ->constrained('personas')
                ->cascadeOnDelete();

            $table->foreignId('interes_id')
                ->constrained('interes')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('interes_persona', function (Blueprint $table) {
            $table->dropForeign(['persona_id']);
            $table->dropForeign(['interes_id']);

            $table->dropColumn(['persona_id', 'interes_id']);
        });
    }
};