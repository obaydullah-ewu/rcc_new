<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('division_id')->after('mobile_number')->nullable();
            $table->unsignedBigInteger('district_id')->after('division_id')->nullable();
            $table->unsignedBigInteger('upazila_id')->after('district_id')->nullable();
            $table->unsignedBigInteger('post_office_id')->after('upazila_id')->nullable();
            $table->unsignedBigInteger('village_id')->after('post_office_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('division_id');
            $table->dropColumn('district_id');
            $table->dropColumn('upazila_id');
            $table->dropColumn('post_office_id');
            $table->dropColumn('village_id');
        });
    }
}
