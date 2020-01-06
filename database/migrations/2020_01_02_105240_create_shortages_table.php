<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShortagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shortages', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedBigInteger('soldier_id')->nullable()->index();
            $table->foreign('soldier_id')->references('id')->on('soldiers')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->dateTime('date')->nullable();
            $table->string('letter_number')->nullable();
            $table->string('time')->nullable(); //modat
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
        Schema::dropIfExists('shortages');
    }
}
