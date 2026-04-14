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
        Schema::create('ammunition', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained()->onDelete('cascade');   // Номер видаткової накладної (вимога)
            $table->integer('row_number')->nullable();                             // № з/п
            $table->string('equipment_name');                                      // Найменування матеріально-технічних засобів
            $table->foreignId('unit_id')->constrained()->onDelete('cascade');      // Одиниці обліку
            $table->integer('authorized_amount')->nullable();                      // За штатом
            $table->integer('ledger_amount')->nullable();                          // По книзі обліку *
            $table->integer('in_stock')->nullable();                               // В наявності *
            $table->integer('lack_amount')->nullable();                            // Нестача засобів
            $table->text('description')->nullable();                               // Примітка
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ammunition');
    }
};
