<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeStepIdNotCascadeToCascadeOnChildStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('childSteps', function (Blueprint $table) {
            $table->dropForeign(['step_id']);
            $table->foreign('step_id')->references('id')->on('steps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('childSteps', function (Blueprint $table) {
            $table->dropForeign(['step_id']);
            $table->foreign('step_id')->references('id')->on('steps');
        });
    }
}
