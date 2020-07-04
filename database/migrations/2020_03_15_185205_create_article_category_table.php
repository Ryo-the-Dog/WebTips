<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_category', function (Blueprint $table) {
            $table->integer('category_id')->unsigned();
            $table->bigInteger('article_id')->unsigned();
            $table->primary(['category_id','article_id']);

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::table('article_category', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });
        Schema::table('article_category', function (Blueprint $table) {
            $table->dropForeign(['article_id']);
        });
        Schema::dropIfExists('article_category');
    }
}
