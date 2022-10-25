<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessNaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_natures', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('application_fee');
            $table->string('new_fee');
            $table->string('renew_fee');
            $table->string('signboard_fee');
            $table->string('license_vat');
            $table->tinyInteger('status')->comment('1=active,0=disable')->default(1);
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
        Schema::dropIfExists('business_natures');
    }
}
