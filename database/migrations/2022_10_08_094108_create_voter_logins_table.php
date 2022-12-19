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
            $table->string('course_section');
            $table->string('status');
            $table->string('department');
            $table->string('college');
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
