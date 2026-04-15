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
        Schema::create('patient_histories_tablr', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_histories_tablr');
    }
};

{
    Schema::create('patient_histories', function (Blueprint $table) {
        $table->id();
        $table->string('last_name')->nullable();
        $table->string('first_name')->nullable();
        $table->string('middle_name')->nullable();
        $table->string('case_no')->nullable();
        $table->string('ward')->nullable();
        $table->string('contact')->nullable();

        $table->text('chief_complaint')->nullable();
        $table->text('history_present')->nullable();
        $table->text('past_history')->nullable();
        $table->text('family_history')->nullable();

        $table->timestamps();
    });
}