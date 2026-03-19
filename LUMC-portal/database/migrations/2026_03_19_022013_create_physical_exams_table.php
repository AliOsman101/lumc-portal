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
        Schema::create('physical_exams', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('physical_exams');
    }
};

{
    Schema::create('physical_exams', function (Blueprint $table) {
        $table->id();
        $table->string('last_name')->nullable();
        $table->string('first_name')->nullable();

        $table->string('bp')->nullable();
        $table->string('temp')->nullable();

        $table->text('skin')->nullable();
        $table->text('head')->nullable();
        $table->text('chest')->nullable();
        $table->text('abdomen')->nullable();

        $table->text('impression')->nullable();

        $table->timestamps();
    });
}