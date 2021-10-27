<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('name',200);
            $table->string('cgc' ,14);
            $table->integer('age');     
            $table->string('sex' ,1);     
            $table->string('phone1',9);
            $table->string('phone2',9)->nullable();
            $table->string('phone3',9)->nullable();
            $table->string('mail'  ,200);
            $table->text('note')->nullable();
            $table->string('blocked',1)->nullable();
            $table->string('deleted',1)->nullable();
            $table->timestamps();
             $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
