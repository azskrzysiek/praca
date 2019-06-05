<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('club_id_home');
            $table->unsignedBigInteger('id_home_player')->nullable();
            $table->unsignedBigInteger('club_id_away');
            $table->unsignedBigInteger('id_away_player')->nullable();
            $table->string('scoreFull');
            $table->string('scoreHalf');
            $table->text('description');
            $table->string('video')->default('noimage.jpg');
            $table->integer('penalty_home')->default(0);
            $table->integer('penalty_away')->default(0);
            $table->boolean('approved');

            $table->timestamps();

            $table->index('user_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
