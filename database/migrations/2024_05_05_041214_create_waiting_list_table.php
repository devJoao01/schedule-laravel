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
        if (!Schema::hasTable('waiting_list')) {
            Schema::create('waiting_list', function (Blueprint $table) {
                $table->id();
                $table->foreignId('patient_id')->constrained('patients');
                $table->foreignId('doctor_id')->constrained('doctors');
                $table->string('priority');
                $table->date('date');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waiting_list');
    }
};
