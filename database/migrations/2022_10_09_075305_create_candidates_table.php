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
            $table->unsignedBigInteger('voters_id')->nullable();
            $table->foreign('voters_id')->references('id')->on('voter_logins');
            $table->unsignedBigInteger('position_id')->nullable();
            $table->foreign('position_id')->references('id')->on('positions');
            $table->unsignedBigInteger('partylist_id')->nullable();
            $table->foreign('partylist_id')->references('id')->on('partylists');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->unsignedBigInteger('college_id')->nullable();
            $table->foreign('college_id')->references('id')->on('colleges');
            $table->string('picture');
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
