<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedBigInteger('soldier_id')->nullable()->index();
            $table->foreign('soldier_id')->references('id')->on('soldiers')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->dateTime('from')->nullable();
            $table->dateTime('to')->nullable();
            $table->tinyInteger('days')->nullable();
            $table->string('type')->nullable(); //estehqaqi, tashviqi, to-rahi, ...
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
        Schema::dropIfExists('leaves');
    }
}
