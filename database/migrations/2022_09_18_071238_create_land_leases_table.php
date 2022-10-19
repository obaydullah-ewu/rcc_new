<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandLeasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_leases', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('user_id');
            /*Start:: Land Applicant Details*/
            $table->string('applicant_name_en');
            $table->string('applicant_name_bn');
            $table->string('father_name');
            $table->string('applicant_email');
            $table->string('nid');
            $table->date('birth_of_date');
            $table->string('mobile_number');
            $table->string('applicant_image')->nullable();
            $table->string('applicant_signature')->nullable();
            $table->unsignedBigInteger('applicant_division_id')->nullable();
            $table->unsignedBigInteger('applicant_district_id')->nullable();
            $table->unsignedBigInteger('applicant_upazila_id')->nullable();
            $table->unsignedBigInteger('applicant_post_office_id')->nullable();
            $table->unsignedBigInteger('applicant_village_id')->nullable();
            /*End:: Land Applicant Details*/

            /*Start:: Land Details*/
            $table->unsignedBigInteger('land_division_id')->nullable();
            $table->unsignedBigInteger('land_district_id')->nullable();
            $table->unsignedBigInteger('land_upazila_id')->nullable();
            $table->unsignedBigInteger('land_mouza_id')->nullable();
            $table->unsignedBigInteger('land_khotiyan_id')->nullable();
            $table->unsignedBigInteger('land_dag_id')->nullable();
            $table->enum('land_nature', ['filled','pond'])->comment('filled=ভরাট (প্রতি বর্গফুট), pond=জলাশয় (প্রতি শতাংশ)')->nullable();
            $table->unsignedBigInteger('land_amount_id')->nullable();
            /*Start:: Land Details*/

            /*Start:: Boundary of the Land */
            $table->text('land_north')->nullable();
            $table->text('land_south')->nullable();
            $table->text('land_east')->nullable();
            $table->text('land_west')->nullable();
            $table->date('first_date_of_lease')->nullable();
            $table->string('first_session_lease')->nullable();
            $table->date('last_date_of_lease')->nullable();
            $table->string('last_session_lease')->nullable();
            /*End:: Boundary of the Land */
            $table->integer('approval_cycle_admin_role_id')->nullable();
            $table->tinyInteger('approval_cycle_id')->comment('1=when cycle id 1, 2=when cycle id 1 forward cycle id 2, 3=when cycle id 2 forward cycle id 3, 4=when cycle id 3 forward cycle id 4, 5=when cycle id 4 forward cycle id 1, 6=when cycle id 1 approved lease. Thus, can be back and forward simultaneously')->nullable();
            $table->enum('application_status', ['pending', 'approved', 'cancelled'])->default('pending')->comment('pending,approved,cancelled')->nullable();
            $table->enum('renewal_status', ['pending', 'approved', 'cancelled'])->default('pending')->comment('pending,approved,cancelled')->nullable();
            $table->string('renewal_cancelled_by')->nullable();
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
        Schema::dropIfExists('land_leases');
    }
}
