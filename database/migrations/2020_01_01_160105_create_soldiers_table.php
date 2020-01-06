<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoldiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soldiers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('national_code')->index()->nullable();
            $table->bigInteger('document_code')->index()->nullable();
            $table->string('document_status')->nullable();
            $table->string('first_name')->index()->nullable();
            $table->string('last_name')->index()->nullable();
            $table->string('father_name')->index()->nullable();
            $table->dateTime('birthday')->nullable();
//            $table->unsignedTinyInteger('birthday_day');
//            $table->unsignedTinyInteger('birthday_month');
//            $table->unsignedTinyInteger('birthday_year');
            $table->string('issue_place')->nullable();
            $table->string('marriage')->nullable();
            $table->string('religion')->nullable();
            $table->string('educations')->nullable();
            $table->unsignedSmallInteger('height')->nullable();
            $table->unsignedSmallInteger('weight')->nullable();
            $table->string('study_field')->nullable();
            $table->string('expertise')->nullable();
            $table->string('province')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('post_code')->nullable();
            $table->text('address')->nullable();
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
        Schema::dropIfExists('soldiers');
    }
}
