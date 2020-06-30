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
            $table->bigInteger('article_id')->unsigned()->index();
            $table->timestamps();
            // ユーザーや記事が削除された場合にはクリア情報も一緒に削除
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clears', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('clears', function (Blueprint $table) {
            $table->dropForeign(['article_id']);
        });

        Schema::dropIfExists('clears');
    }
}
