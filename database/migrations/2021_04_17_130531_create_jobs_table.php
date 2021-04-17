<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('writer_id')->unsigned();
            $table->foreign('writer_id')->references('id')->on('writers')->onDelete('cascade');
            $table->string('service')->nullable();
            $table->string('subject')->nullable();
            $table->integer('pages')->nullable();
            $table->text('topic')->nullable();
            $table->text('paper_instructions')->nullable();
            $table->dateTime('deadline')->nullable();
            $table->float('price');
            $table->enum('status', ['processing', 'in_progress', 'released', 'cancelled']);
            $table->softDeletes();
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
        Schema::dropIfExists('jobs');
    }
}