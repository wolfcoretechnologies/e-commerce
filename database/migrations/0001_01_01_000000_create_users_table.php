<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // id
            $table->string('first_name', 100); // first_name
            $table->string('last_name', 100);  // last_name
            $table->string('username', 100);   // username
            $table->string('email', 100)->unique(); // email
            $table->string('address', 300);    // address
            $table->enum('role', ['user', 'shop_user', 'admin', ''])->default('user')->nullable(); // role
            $table->string('password', 500);   // password
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}

