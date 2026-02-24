<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nutrition_requests', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('patient_name')->nullable();
            $table->string('hospital_no')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('attending_physician')->nullable();
            $table->date('admission_date')->nullable();
            $table->string('diagnosis')->nullable();
            $table->string('religion')->nullable();

            $table->text('food_intake')->nullable();
            $table->text('functional_assessment')->nullable();

            $table->string('height_cm')->nullable();
            $table->string('weight_kg')->nullable();
            $table->string('usual_weight_kg')->nullable();
            $table->string('bmi')->nullable();
            $table->string('weight_change_pct')->nullable();
            $table->string('percent_ibw')->nullable();

            $table->json('labs')->nullable();

            $table->integer('total_points')->nullable();
            $table->string('risk')->nullable();
            $table->text('nutrition_diagnosis')->nullable();
            $table->text('nutrition_intervention')->nullable();

            $table->string('total_energy')->nullable();
            $table->string('total_carbohydrates')->nullable();
            $table->string('total_protein')->nullable();
            $table->string('total_fat')->nullable();

            $table->text('monitoring')->nullable();
            $table->string('prepared_by')->nullable();
            $table->string('conforme')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nutrition_requests');
    }
};
