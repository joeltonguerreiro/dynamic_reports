<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_filters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_meta_id');
            $table->string('comparison_rule');
            $table->string('sql_operator');
            $table->timestamps();
            $table->foreign('report_meta_id')->references('id')->on('report_metas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_filters');
    }
}
