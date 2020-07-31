<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHashTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hash_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->timestamps();
        });

        Schema::create('hash_tag_tweet', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('hash_tag_id')->unsigned();
            $table->bigInteger('tweet_id')->unsigned();
            $table->timestamps();

            $table->foreign('hash_tag_id')->references('id')->on('hash_tags')
                    ->onDelete('cascade');
            $table->foreign('tweet_id')->references('id')->on('tweets')
                    ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hash_tag_tweet');
        Schema::dropIfExists('hash_tags');
    }
}
