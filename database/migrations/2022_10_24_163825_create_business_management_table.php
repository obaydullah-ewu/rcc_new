<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_management', function (Blueprint $table) {
            $table->id();
            $table->string('market_branch');
            $table->string('ward_no');
            $table->string('location');
            $table->string('market_name');
            $table->tinyInteger('status')->comment('1=active, 0=disable')->default(1);
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
        Schema::dropIfExists('business_management');
    }
}
