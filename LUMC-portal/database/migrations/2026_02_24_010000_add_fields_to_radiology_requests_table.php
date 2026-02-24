<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('radiology_requests', function (Blueprint $table) {
            $table->date('date')->nullable()->after('id');
            $table->string('rad_file')->nullable();
            $table->string('hospital_no')->nullable();
            $table->string('ward')->nullable();
            $table->json('source')->nullable();

            $table->json('modality')->nullable();

            $table->string('family_name')->nullable();
            $table->string('given_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('address')->nullable();
            $table->date('dob')->nullable();
            $table->string('age')->nullable();
            $table->string('sex')->nullable();

            $table->text('examination')->nullable();
            $table->text('clinical_diagnosis')->nullable();
            $table->text('findings')->nullable();

            $table->text('radiologist_interpretation')->nullable();
            $table->string('requesting_physician')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('radiology_requests', function (Blueprint $table) {
            $table->dropColumn([
                'date','rad_file','hospital_no','ward','source','modality',
                'family_name','given_name','middle_name','address','dob','age','sex',
                'examination','clinical_diagnosis','findings','radiologist_interpretation','requesting_physician'
            ]);
        });
    }
};
