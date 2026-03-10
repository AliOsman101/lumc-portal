<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laboratory_requests', function (Blueprint $table) {
            $table->id();

            // Patient Information
            $table->date('date_of_request')->nullable();
            $table->string('hospital_no')->nullable();
            $table->string('receipt_number')->nullable();
            $table->string('ward_phic')->nullable();

            $table->string('surname')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('address')->nullable();

            $table->date('birth_date')->nullable();
            $table->unsignedInteger('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('civil_status')->nullable();

            $table->string('clinical_diagnosis')->nullable();
            $table->string('requesting_physician')->nullable();

            // Request Type
            $table->string('request_type')->nullable(); // routine | stat
            $table->string('justification')->nullable();

            // Test Groups
            $table->json('hematology')->nullable();
            $table->boolean('blood_typing')->default(false);
            $table->json('serology')->nullable();

            $table->json('chemistry')->nullable();
            $table->json('lipid_profile')->nullable();
            $table->json('serum_electrolytes')->nullable();
            $table->json('renal_profile')->nullable();
            $table->json('hbt_profile')->nullable();

            $table->json('clinical_microscopy')->nullable();
            $table->json('microbiology')->nullable();

            // Microbiology details
            $table->string('micro_specimen')->nullable();
            $table->string('antibiotics_taken')->nullable();
            $table->string('duration')->nullable();

            // Others
            $table->text('others')->nullable();

            // Footer
            $table->date('footer_date')->nullable();
            $table->time('request_received')->nullable();
            $table->time('specimen_collected')->nullable();
            $table->time('test_started')->nullable();
            $table->time('test_done')->nullable();
            $table->unsignedInteger('pages')->default(1);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laboratory_requests');
    }
};