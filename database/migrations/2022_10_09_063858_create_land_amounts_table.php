<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandAmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_amounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('division_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('upazila_id')->nullable();
            $table->unsignedBigInteger('mouza_id')->nullable();
            $table->unsignedBigInteger('land_khotiyan_id')->nullable();
            $table->unsignedBigInteger('land_dag_id')->nullable();
            $table->enum('land_nature', ['filled','pond'])->comment('filled=ভরাট (প্রতি বর্গফুট), pond=জলাশয় (প্রতি শতাংশ)');
            $table->float('amount');
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
        Schema::dropIfExists('land_amounts');
    }
}
