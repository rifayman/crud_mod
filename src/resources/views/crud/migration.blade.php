<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create__Singular__Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__plural__', function (Blueprint $table) {
            
            $table->increments('id');
            
            __migration_fields__

            $table->timestamps();

        });

        Schema::create('__singular___translations', function (Blueprint $table) {
            
            $table->increments('id');

            $table->integer('__plural___id')->unsigned()->index();
            $table->foreign('__plural___id')->references('id')->on('__plural__')->onDelete('cascade');

            __migration_translatable_fields__

            $table->string('locale');
                        
            $table->unique(['__plural___id', 'locale']);
            
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
        Schema::drop('__singular___translations');
        Schema::drop('__plural__');
    }
}
