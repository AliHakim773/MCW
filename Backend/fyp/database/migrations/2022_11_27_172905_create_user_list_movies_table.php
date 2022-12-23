<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserlistMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_user_list', function (Blueprint $table) {
            $table->id();
            $table->integer('user_list_id')->unsigned();
            $table->integer('movie_id')->unsigned();
            $table->foreign('user_list_id')->references('id')->on('user_lists')
                ->onDelete('cascade');
            $table->foreign('movie_id')->references('id')->on('movies')
                ->onDelete('cascade');
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
        Schema::dropIfExists('user_list_movies');
    }
}
