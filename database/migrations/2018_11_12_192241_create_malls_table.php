<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('malls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',191);
            $table->string('address',191)->nullable();
            $table->string('facebook',191)->nullable();
            $table->string('twitter',191)->nullable();
            $table->string('website',191)->nullable();
            $table->string('contact_name',191)->nullable();
            $table->integer('mobile')->nullable();
            $table->string('lat',191)->nullable();
            $table->string('long',191)->nullable();
            $table->string('icon',191)->nullable();
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
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
        Schema::dropIfExists('malls');
    }
}
