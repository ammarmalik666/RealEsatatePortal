<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('bedrooms');
            $table->string('bathrooms');
            $table->string('square_footage');
            $table->string('lot_acreage');
            $table->string('cars_in_garage');
            $table->longText('pictures')->nullable();
            $table->string('date_acquired')->nullable();
            $table->string('acquisition_price')->nullable();
            $table->string('date_completed')->nullable();
            $table->string('after_renovation_value')->nullable();
            $table->string('sale_date')->nullable();
            $table->string('sale_price')->nullable();
            $table->string('property_status')->nullable();
            $table->string('slug');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
};
