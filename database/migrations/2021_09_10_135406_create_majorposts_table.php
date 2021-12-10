<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMajorpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('majorposts', function (Blueprint $table) {
            $table->id();
            $table->integer('cat_id')->unsigned();
            $table->integer('sub_id')->unsigned();
            $table->string('title', 200);
            $table->string('sub_title', 200);
            $table->longtext('details');
            $table->string('image');
            $table->string('reporter');
            $table->integer('view')->default(0);
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
        Schema::dropIfExists('mojorposts');
    }
}
