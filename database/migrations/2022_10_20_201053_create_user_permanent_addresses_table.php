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
            $table->string('per_holding')->nullable();
            $table->string('per_village')->nullable();
            $table->string('per_ward')->nullable();
            $table->string('per_post_office')->nullable();
            $table->string('per_upazila')->nullable();
            $table->string('per_district')->nullable();
            $table->string('per_division')->nullable();
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
