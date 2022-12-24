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
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('voter_id')->nullable();
            $table->foreign('voter_id')->references('id')->on('voter_logins');
            $table->unsignedBigInteger('candidate_id')->nullable();
            $table->foreign('candidate_id')->references('id')->on('candidates');
            $table->unsignedBigInteger('position_id')->nullable();
            $table->foreign('position_id')->references('id')->on('positions');
            // $table->unsignedBigInteger('images_id')->nullable();
            // $table->foreign('images_id')->references('id')->on('images');
            // $table->unsignedBigInteger('candidate-details_id')->nullable();
            // $table->foreign('position_id')->references('id')->on('positions');
            // $table->unsignedBigInteger('department_id')->nullable();
            // $table->foreign('department_id')->references('id')->on('departments');
            // $table->unsignedBigInteger('college_id')->nullable();
            // $table->foreign('college_id')->references('id')->on('colleges');
            // $table->unsignedBigInteger('coursesection_id')->nullable();
            // $table->foreign('coursesection_id')->references('id')->on('course_sections');
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
        Schema::dropIfExists('votes');
    }
};
