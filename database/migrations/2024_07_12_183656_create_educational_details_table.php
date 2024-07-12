<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('educational_details', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('university_board');
            $table->string('college_institute');
            $table->year('passing_year');
            $table->decimal('cgpa_percentage', 5, 2);
            $table->string('edu_category');
            $table->string('course');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('educational_details');
    }
};
