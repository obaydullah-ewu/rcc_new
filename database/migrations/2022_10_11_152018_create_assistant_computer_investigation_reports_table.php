<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistantComputerInvestigationReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistant_computer_investigation_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('land_lease_id')->nullable();
            $table->date('investigation_english_date')->nullable();
            $table->string('investigation_bangla_date')->nullable();
            $table->date('last_date_of_renew')->nullable();
            $table->float('vat')->comment('percentage')->default(0)->nullable();
            $table->float('tax')->comment('percentage')->default(0)->nullable();
            $table->float('stamp_money')->default(0)->nullable();
            $table->integer('deposit_money_submit_day')->default(0)->nullable();
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
        Schema::dropIfExists('assistant_computer_investigation_reports');
    }
}
