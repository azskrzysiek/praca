<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->integer('position')->nullable()->default(10);
            $table->integer('age')->nullable();
            $table->integer('experience')->nullable();
            $table->integer('height')->nullable();
            $table->integer('club_id')->nullable()->default(0);
            $table->string('image')->nullable();
            $table->string('urlFacebook')->nullable();
            $table->string('urlTwitter')->nullable();
            $table->string('urlInstagram')->nullable();
            $table->text('description')->nullable();
            $table->integer('number')->default(0);
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
        Schema::dropIfExists('profiles');
    }
}
