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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 60)->nullable();
            $table->string('apellido', 60)->nullable();
            $table->string('email', 30)->unique()->nullable();
            $table->string('telefono', 11)->nullable();
            $table->boolean('confirmado')->nullable();
            $table->boolean('admin')->nullable();
            $table->string('token', 15)->nullable();
            // 
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
};
