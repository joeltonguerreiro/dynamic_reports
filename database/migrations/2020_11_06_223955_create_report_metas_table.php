<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_metas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_id');
            $table->foreignId('meta_id');
            $table->timestamps();
            $table->foreign('report_id')->references('id')->on('reports');
            $table->foreign('meta_id')->references('id')->on('metas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_metas');
    }
}
