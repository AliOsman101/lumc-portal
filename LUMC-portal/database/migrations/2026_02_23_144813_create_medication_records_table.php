<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('medication_records', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            // patient header fields (same as paper)
            $table->string('last_name')->nullable();
            $table->string('given_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('hospital_case_no')->nullable();
            $table->string('ward_service')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('tel_no')->nullable();
            $table->string('sex')->nullable();          // M / F
            $table->string('civil_status')->nullable(); // S / M / D / W / SP

            // main data
            $table->string('month')->nullable();  // e.g. "Feb 2026"
            $table->json('grid')->nullable();     // store checkmarks

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medication_records');
    }
};