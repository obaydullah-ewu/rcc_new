<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPresentAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_present_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('pre_holding_en')->nullable();
            $table->string('pre_holding_bn')->nullable();
            $table->string('pre_village_en')->nullable();
            $table->string('pre_village_bn')->nullable();
            $table->string('pre_ward_no_en')->nullable();
            $table->string('pre_ward_no_bn')->nullable();
            $table->string('pre_post_office_en')->nullable();
            $table->string('pre_post_office_bn')->nullable();
            $table->string('pre_union_en')->nullable();
            $table->string('pre_union_bn')->nullable();
            $table->string('pre_upazila_en')->nullable();
            $table->string('pre_upazila_bn')->nullable();
            $table->string('pre_district_en')->nullable();
            $table->string('pre_district_bn')->nullable();
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
        Schema::dropIfExists('user_present_addresses');
    }
}
