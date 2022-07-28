<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_lang', function (Blueprint $table) {
            $table->bigIncrements('id');
        $table->string('ordernum' );
        $table->string('address');
        $table->decimal('price');
        $table->string('name');
        $table->date('date');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('country_lang');
    }
}
