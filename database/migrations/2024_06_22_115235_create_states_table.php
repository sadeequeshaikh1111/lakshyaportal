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
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('country_id');
            $table->timestamps();

            // Here, the foreign key constraint is commented out
            // $table->foreign('country_id')->references('id')->on('countries');
        });

        // Insert states for India
        DB::table('states')->insert([
            ['id' => 1, 'name' => 'Andhra Pradesh', 'country_id' => 1],
            ['id' => 2, 'name' => 'Arunachal Pradesh', 'country_id' => 1],
            ['id' => 3, 'name' => 'Assam', 'country_id' => 1],
            ['id' => 4, 'name' => 'Bihar', 'country_id' => 1],
            ['id' => 5, 'name' => 'Chhattisgarh', 'country_id' => 1],
            ['id' => 6, 'name' => 'Goa', 'country_id' => 1],
            ['id' => 7, 'name' => 'Gujarat', 'country_id' => 1],
            ['id' => 8, 'name' => 'Haryana', 'country_id' => 1],
            ['id' => 9, 'name' => 'Himachal Pradesh', 'country_id' => 1],
            ['id' => 10, 'name' => 'Jharkhand', 'country_id' => 1],
            ['id' => 11, 'name' => 'Karnataka', 'country_id' => 1],
            ['id' => 12, 'name' => 'Kerala', 'country_id' => 1],
            ['id' => 13, 'name' => 'Madhya Pradesh', 'country_id' => 1],
            ['id' => 14, 'name' => 'Maharashtra', 'country_id' => 1],
            ['id' => 15, 'name' => 'Manipur', 'country_id' => 1],
            ['id' => 16, 'name' => 'Meghalaya', 'country_id' => 1],
            ['id' => 17, 'name' => 'Mizoram', 'country_id' => 1],
            ['id' => 18, 'name' => 'Nagaland', 'country_id' => 1],
            ['id' => 19, 'name' => 'Odisha', 'country_id' => 1],
            ['id' => 20, 'name' => 'Punjab', 'country_id' => 1],
            ['id' => 21, 'name' => 'Rajasthan', 'country_id' => 1],
            ['id' => 22, 'name' => 'Sikkim', 'country_id' => 1],
            ['id' => 23, 'name' => 'Tamil Nadu', 'country_id' => 1],
            ['id' => 24, 'name' => 'Telangana', 'country_id' => 1],
            ['id' => 25, 'name' => 'Tripura', 'country_id' => 1],
            ['id' => 26, 'name' => 'Uttar Pradesh', 'country_id' => 1],
            ['id' => 27, 'name' => 'Uttarakhand', 'country_id' => 1],
            ['id' => 28, 'name' => 'West Bengal', 'country_id' => 1],
            ['id' => 29, 'name' => 'Andaman and Nicobar Islands', 'country_id' => 1],
            ['id' => 30, 'name' => 'Chandigarh', 'country_id' => 1],
            ['id' => 31, 'name' => 'Dadra and Nagar Haveli and Daman and Diu', 'country_id' => 1],
            ['id' => 32, 'name' => 'Delhi', 'country_id' => 1],
            ['id' => 33, 'name' => 'Jammu and Kashmir', 'country_id' => 1],
            ['id' => 34, 'name' => 'Ladakh', 'country_id' => 1],
            ['id' => 35, 'name' => 'Lakshadweep', 'country_id' => 1],
            ['id' => 36, 'name' => 'Puducherry', 'country_id' => 1],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
};
