<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->nullable();
            $table->string('name_bn')->nullable();
            $table->string('father_name_en')->nullable();
            $table->string('father_name_bn')->nullable();
            $table->string('mother_name_en')->nullable();
            $table->string('mother_name_bn')->nullable();
            $table->string('mobile_number')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('nid')->nullable();
            $table->string('birth_certificate_no')->nullable();
            $table->string('passport_no')->nullable();
            $table->date('birth_of_date')->nullable();
            $table->string('gender')->nullable();
            $table->string('religion')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('monthly_income')->nullable();
            $table->string('yearly_income')->nullable();
            $table->string('profession')->nullable();
            $table->string('landless_status')->nullable();
            $table->string('handicapped_status')->nullable();
            $table->string('river_break_status')->nullable();
            $table->string('freedom_son_status')->nullable();
            $table->string('image')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
