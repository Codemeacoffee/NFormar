<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('platformId');
            $table->string('category', 100);
            $table->string('name', 100);
            $table->string('image', 100)->default('default.png');
            $table->string('imageAlt', 100)->nullable();
            $table->longText('description')->nullable();
            $table->longText('formativeInfo')->nullable();
            $table->string('price', 20)->nullable();
            $table->string('oldPrice', 20)->nullable();
            $table->bigInteger('newUntil')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
