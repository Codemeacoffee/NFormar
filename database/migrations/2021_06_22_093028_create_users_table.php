<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email', 100)->unique();
            $table->string('name', 100);
            $table->string('surnames', 100);
            $table->text('address')->nullable();
            $table->string('country', 2)->nullable();
            $table->string('password', 100);
            $table->boolean('advertising')->default(false);
            $table->string('rememberToken', 50)->nullable();
            $table->boolean('confirmed')->default(false);
            $table->string('confirmationCode', 50)->nullable();
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
        Schema::dropIfExists('users');
    }
}
