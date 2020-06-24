<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clears', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned()->index();
            $table->bigInteger('child_step_id')->unsigned()->index();
            $table->timestamps();
            // ユーザーや子ステップが削除された場合にはクリア情報も一緒に削除(子STEPは親STEPが削除されると削除される)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('child_step_id')->references('id')->on('childSteps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clears');
    }
}
