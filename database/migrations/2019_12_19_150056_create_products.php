<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description',100);
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('um_id');
            $table->unsignedBigInteger('um2_id')->nullable();
            $table->unsignedBigInteger('warehouse_id');
            $table->float('conversion_factor')->nullable();
            $table->string('conversion_type',1)->nullable();
            $table->string('image',30)->nullable();
            $table->softDeletes();
            $table->timestamps();

            //foreign
            $table->foreign('type_id')->references('id')->on('type_of_products');
            $table->foreign('group_id')->references('id')->on('product_group');
            $table->foreign('um_id')->references('id')->on('units_of_measure');
            $table->foreign('um2_id')->references('id')->on('units_of_measure')->nullable();
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->nullable();


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
