<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPermanentAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_permanent_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('per_holding_en')->nullable();
            $table->string('per_holding_bn')->nullable();
            $table->string('per_village_en')->nullable();
            $table->string('per_village_bn')->nullable();
            $table->string('per_ward_no_en')->nullable();
            $table->string('per_ward_no_bn')->nullable();
            $table->string('per_post_office_en')->nullable();
            $table->string('per_post_office_bn')->nullable();
            $table->string('per_union_en')->nullable();
            $table->string('per_union_bn')->nullable();
            $table->string('per_upazila_en')->nullable();
            $table->string('per_upazila_bn')->nullable();
            $table->string('per_district_en')->nullable();
            $table->string('per_district_bn')->nullable();
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
        Schema::dropIfExists('user_permanent_addresses');
    }
}
