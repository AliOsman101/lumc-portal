<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nutrition_screenings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            // Patient info
            $table->string('patient_name')->nullable();
            $table->string('address')->nullable();
            $table->string('age')->nullable();
            $table->string('sex')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();

            // 체크박스 fields (store as JSON arrays)
            $table->json('clinical_conditions')->nullable();     // A
            $table->json('intake_weight_history')->nullable();   // B

            $table->string('others_a')->nullable();
            $table->string('others_b')->nullable();

            // Nurse accomplished
            $table->string('nurse_printed_name')->nullable();
            $table->string('nurse_signature')->nullable();
            $table->string('nurse_datetime')->nullable();

            // Referral for MNT
            $table->string('diagnosis')->nullable();
            $table->string('diet_prescription')->nullable();
            $table->string('diet_type')->nullable(); // per_orem / tube_feeding / npotpn
            $table->string('physician_printed_name')->nullable();
            $table->string('physician_signature')->nullable();
            $table->string('physician_datetime')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nutrition_screenings');
    }
};