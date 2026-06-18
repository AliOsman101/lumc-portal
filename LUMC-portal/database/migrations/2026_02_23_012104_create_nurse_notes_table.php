<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nurse_notes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            $table->string('last_name')->nullable();
            $table->string('given_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('hospital_case_no')->nullable();

            $table->string('permanent_address')->nullable();
            $table->string('tel_no')->nullable();
            $table->string('ward_service')->nullable();

            $table->string('sex')->nullable();
            $table->string('civil_status')->nullable();

            $table->string('date_shift')->nullable();
            $table->string('signature')->nullable();

            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nurse_notes');
    }
};