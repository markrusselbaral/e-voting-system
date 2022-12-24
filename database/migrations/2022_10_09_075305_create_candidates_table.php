<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('ismis_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('course_section');
            $table->string('department');
            $table->string('college');
            $table->unsignedBigInteger('position_id')->nullable();
            $table->foreign('position_id')->references('id')->on('positions');
            $table->string('partylist');
            $table->string('picture');
            
            
            // $table->unsignedBigInteger('position_id')->nullable();
            // $table->foreign('position_id')->references('id')->on('positions');
            // $table->unsignedBigInteger('partylist_id')->nullable();
            // $table->foreign('partylist_id')->references('id')->on('partylists');
            // $table->string('picture');

            // $table->unsignedBigInteger('department_id')->nullable();
            // $table->foreign('department_id')->references('id')->on('departments');
            // $table->unsignedBigInteger('college_id')->nullable();
            // $table->foreign('college_id')->references('id')->on('colleges');
            // $table->unsignedBigInteger('coursesection_id')->nullable();
            // $table->foreign('coursesection_id')->references('id')->on('course_sections');
            // $table->string('picture');
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
        Schema::dropIfExists('candidates');
    }
};
