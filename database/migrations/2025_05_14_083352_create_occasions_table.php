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
        Schema::create('occasions', function (Blueprint $table) {
            $table->id();
            $table->string('advertisingtitle');
            $table->float('askprice');
            $table->string('licenceplate')->unique();
            $table->string('description');
            $table->integer('mileage');
            $table->json('images');
            $table->string('transmission');
            $table->string('brand');
            $table->string('model');
            $table->string('color');
            $table->integer('buildyear');
            $table->string('carbody');
            $table->string('fuel');
            $table->integer('doors');
            $table->integer('seats');
            $table->date('apk');
            $table->integer('fuelconsumption');
            $table->string('fuelefficiency');
            $table->integer('cylindercapacity');
            $table->integer('weight');
            $table->integer('btw')->default(21);
            $table->boolean('sold')->default(false);
            $table->boolean('reserved')->default(false);
            $table->boolean('hidden')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('occasions');
    }
};
