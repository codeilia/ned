<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_infos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('soldier_id')->nullable()->index();
            $table->foreign('soldier_id')->references('id')->on('soldiers')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->string('living_city')->nullable();
            $table->integer('distance')->nullable(); //masafat be kilometer
            $table->integer('marriage_vacation_leave')->nullable(); //mizan morakhasi taahol
            $table->integer('parents_die_vacation_leave')->nullable(); //mizan morakhasi fowt valedein
            $table->integer('bonus')->nullable(); //tashviqi
            $table->integer('total')->nullable();
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
        Schema::dropIfExists('leave_infos');
    }
}
