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
        Schema::create('roles', function (Blueprint $table) {
            $table->id('role_id');
            $table->bigInteger('movie_id')->unsigned();
            $table->bigInteger('cast_id')->unsigned();
            $table->string('name', 45);
            $table->foreign('movie_id')
                ->references('movie_id')
                ->on('movies');

            $table->foreign('cast_id')
                ->references('cast_id')
                ->on('casts');

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
        Schema::dropIfExists('roles');
    }
};
