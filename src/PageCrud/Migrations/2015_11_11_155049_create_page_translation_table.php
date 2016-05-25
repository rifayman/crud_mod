<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_translations', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name'); // Translated column.
            $table->string('slug'); // Translated column.
            $table->text('content'); // Translated column.
            $table->text('extras'); // Translated column.

            $table->integer('page_id')->unsigned()->index();
            $table->foreign('page_id')->references('id')->on('page')->onDelete('cascade');

            $table->integer('locale_id')->unsigned()->index();
            $table->foreign('locale_id')->references('id')->on('locale')->onDelete('cascade');

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
        Schema::drop('page_translations');
    }
}
