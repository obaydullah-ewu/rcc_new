<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitizenshipCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizenship_certificates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('nid')->nullable();
            $table->string('birth_certificate_no')->nullable();
            $table->string('district')->nullable();
            $table->string('upazila')->nullable();
            $table->string('union')->nullable();
            $table->string('post_office')->nullable();
            $table->string('ward_no')->nullable();
            $table->string('village')->nullable();
            $table->string('holding_no')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('certificate_fee')->nullable();
            $table->string('information_centre_fee')->nullable();
            $table->string('total_fee')->nullable();
            $table->date('date')->nullable();
            $table->string('payment_details')->nullable();
            $table->string('bank_draft_no')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('bank_slip')->nullable();
            $table->string('mobile_banking_number')->nullable();
            $table->string('trx_id')->nullable();
            $table->string('rashid_no')->nullable();
            $table->string('serial_no')->nullable();
            $table->tinyInteger('status')->comment('1=pending, 2=approved, 3=cancelled')->default(1);
            $table->timestamps();
        });
    }

    /**
     * _Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citizenship_certificates');
    }
}
