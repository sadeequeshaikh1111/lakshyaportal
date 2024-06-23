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
        //
        Schema::create('exam_details', function (Blueprint $table) {
            $table->id();
            $table->string('exam_name');
            $table->string('custom1_field');
            $table->string('custom2_field');
            $table->string('custom3_field');


            $table->timestamps();

            // Here, the foreign key constraint is commented out
            // $table->foreign('country_id')->references('id')->on('countries');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
