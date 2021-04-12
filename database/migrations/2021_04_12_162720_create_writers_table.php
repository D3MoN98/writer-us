<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWritersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('writers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('finished_papers')->nullable();
            $table->integer('customer_reviews')->nullable();
            $table->integer('global_rating_rank')->nullable();
            $table->integer('rating_score')->nullable();
            $table->integer('success_rate')->nullable();
            $table->float('cost')->nullable();
            $table->text('image')->nullable();
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
        Schema::dropIfExists('writers');
    }
}