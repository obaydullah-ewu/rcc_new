<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMouzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mouzas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('division_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('upazila_id')->nullable();
            $table->string('name');
            $table->float('land_nature_filled_present_rate')->comment('ভরাট (প্রতি বর্গফুট)')->nullable();
            $table->float('land_nature_pond_present_rate')->comment('জলাশয় (প্রতি শতাংশ)')->nullable();
            $table->float('land_nature_filled_recommended_rate')->comment('ভরাট (প্রতি বর্গফুট)')->nullable();
            $table->float('land_nature_pond_recommended_rate')->comment('জলাশয় (প্রতি শতাংশ)')->nullable();
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
        Schema::dropIfExists('mouzas');
    }
}
