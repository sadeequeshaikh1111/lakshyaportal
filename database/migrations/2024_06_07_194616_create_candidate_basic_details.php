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
        Schema::create('candidate_basic_details', function (Blueprint $table) {
            $table->id();
                   $table->string('registration_number')->unique();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('mothers_name')->nullable();
            $table->date('date_of_birth')->nullable();  // Using the date type, format can be handled in application logic
            $table->text('permanent_address')->nullable();
            $table->string('gender')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->string('taluka')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('preferred_exam_location_1')->nullable();
            $table->string('preferred_exam_location_2')->nullable();
            $table->string('preferred_exam_location_3')->nullable();
            $table->json('custom_values')->nullable();
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_basic_details');
    }
};
