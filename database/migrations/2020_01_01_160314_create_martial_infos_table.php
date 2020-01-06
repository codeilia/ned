<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMartialInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('martial_infos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('soldier_id')->nullable()->index();
            $table->foreign('soldier_id')->references('id')->on('soldiers')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedInteger('unit_id')->unsigned()->nullable()->index();
            $table->foreign('unit_id')->references('id')->on('units')
                ->onDelete('cascade')->onUpdate('cascade'); // Create this table

            $table->string('sent_zone')->nullable();
            $table->dateTime('sent_date')->nullable();
            $table->dateTime('end_date')->nullable(); // ( =sent_date + 21 mah)
            $table->dateTime('start_date')->nullable();
//            $table->unsignedTinyInteger('sent_date_day');
//            $table->unsignedTinyInteger('sent_date_month');
//            $table->unsignedTinyInteger('sent_date_year');
//            $table->unsignedTinyInteger('end_date_day'); // this should be calculated by adding 21 month to the entered date
//            $table->unsignedTinyInteger('end_date_month'); // this should be calculated by adding 21 month to the entered date
//            $table->unsignedTinyInteger('end_date_year'); // this should be calculated by adding 21 month to the entered date
//            $table->unsignedTinyInteger('start_date_day');
//            $table->unsignedTinyInteger('start_date_month');
//            $table->unsignedTinyInteger('start_date_year');
            $table->string('personal_code')->nullable();
            $table->string('degree')->nullable();
            $table->integer('term')->nullable();
            $table->string('health_code')->nullable();
            $table->smallInteger('legal_duty_time')->nullable(); // by month !!
            $table->string('tosieh_code')->nullable(); // 1.salem 2.moaf az razm  3.moaf az razm va post
            $table->string('category')->nullable(); // raste khedmati
            $table->boolean('native')->nullable();
            $table->string('training_camp')->nullable();
            $table->boolean('green_card')->nullable(); // karte sabz dare ya nadare?
            $table->text('previous_duty_place_state')->nullable(); // vaziate mahal khedmat qabli
            $table->dateTime('previous_intro_date')->nullable(); // tarikh moarefi az radeh qabli
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
        Schema::dropIfExists('martial_infos');
    }
}
