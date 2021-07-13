<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaycanhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caycanh', function (Blueprint $table) {
            $table->increments('id');
            $table->int('macay');
            $table->string('tencay', 255);
            $table->string('loai', 255);
            $table->string('mota', 255);
            $table->int('namtrong');
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
        Schema::dropIfExists('caycanh');
    }
}
