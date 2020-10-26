<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Settings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('siteName',191);
            $table->string('logo',191)->nullable();
            $table->string('icon',191)->nullable();
            $table->string('email',191)->nullable();
            $table->string('main_lang',191)->default('en');
            $table->string('description',191)->nullable();
            $table->string('keywords',191)->nullable();
            $table->enum('status',['open','close']);
            $table->longText('message_minten')->nullable();
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
        Schema::dropIfExists('setting');
    }
}
