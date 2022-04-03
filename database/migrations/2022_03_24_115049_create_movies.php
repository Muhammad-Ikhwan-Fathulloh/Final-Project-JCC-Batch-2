<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id('movie_id');
            $table->bigInteger('genre_id')->unsigned();
            $table->string('title', 45);
            $table->text('summary');
            $table->bigInteger('year');
            $table->string('poster', 200);
            $table->foreign('genre_id')
                ->references('genre_id')
                ->on('genres');

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
};
