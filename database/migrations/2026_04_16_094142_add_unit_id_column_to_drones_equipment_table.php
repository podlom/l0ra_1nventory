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
        Schema::table('drones_equipment', function (Blueprint $table) {
            $table->foreignId('unit_id')->nullable()->constrained()->nullOnDelete();    // Одиниці виміру
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('drones_equipment', function (Blueprint $table) {
            $table->dropForeign('drones_equipment_unit_id_foreign');
        });
    }
};
