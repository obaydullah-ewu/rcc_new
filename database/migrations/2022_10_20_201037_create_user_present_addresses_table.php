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
            $table->string('pre_holding')->nullable();
            $table->string('pre_village')->nullable();
            $table->string('pre_ward')->nullable();
            $table->string('pre_post_office')->nullable();
            $table->string('pre_upazila')->nullable();
            $table->string('pre_district')->nullable();
            $table->string('pre_division')->nullable();
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
