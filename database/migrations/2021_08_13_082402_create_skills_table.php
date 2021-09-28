<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('skill');
            $table->integer('percent');
            $table->boolean('state')->default(1);
            $table->string('avatar')->default('fab fa-react');
            $table->timestamps();
            $table->unsignedInteger('profile_id');
            //FOREIGN KEY CONSTRAINTS
            $table->foreign('profile_id')->references('id')->on('profile')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skills');
    }
}
