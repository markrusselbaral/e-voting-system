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
        Schema::create('voter_logins', function (Blueprint $table) {
            $table->id();
            $table->string('ismis_id');
            $table->string('fname');
            $table->string('lname');
            $table->unsignedBigInteger('course_section_id')->nullable();
            $table->foreign('course_section_id')->references('id')->on('course_sections');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id')->references('id')->on('statuses');
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
        Schema::dropIfExists('voter_logins');
    }
};
