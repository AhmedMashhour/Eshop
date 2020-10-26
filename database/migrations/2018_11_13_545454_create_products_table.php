<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',191)->nullable();
            $table->string('photo',191)->nullable();
            $table->longText('content',191)->nullable();
            $table->string('weight',191)->nullable();
            $table->integer('stock')->default(0)->nullable();
            $table->decimal('price',10,3)->nullable();
            $table->decimal('price_offer',10,3)->nullable();
            $table->enum('status',['pending','refused','active'])->default('pending');
            $table->longText('reason')->nullable();
            $table->date('end_at')->nullable();
            $table->date('start_at')->nullable();
            $table->date('start_offer_at')->nullable();
            $table->date('end_offer_at')->nullable();
            $table->longText('other_data')->nullable();

            $table->integer('department_id')->unsigned()->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

            $table->integer('currency_id')->unsigned()->nullable();
            $table->foreign('currency_id')->references('id')->on('countries')->onUpdate('cascade');

            $table->integer('trademark_id')->unsigned()->nullable();
            $table->foreign('trademark_id')->references('id')->on('trademarks')->onDelete('cascade');

            $table->integer('manufact_id')->unsigned()->nullable();
            $table->foreign('manufact_id')->references('id')->on('manufacts')->onDelete('cascade');
            /*
                        $table->integer('mall_id')->unsigned()->nullable();
                        $table->foreign('mall_id')->references('id')->on('malls')->onDelete('cascade');
            */
            $table->integer('color_id')->unsigned()->nullable();
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');

            $table->string('size',191)->nullable();
            $table->integer('size_id')->unsigned()->nullable();
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');

            $table->integer('weight_id')->unsigned()->nullable();
            $table->foreign('weight_id')->references('id')->on('weights')->onDelete('cascade');

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
        Schema::dropIfExists('products');
    }
}
