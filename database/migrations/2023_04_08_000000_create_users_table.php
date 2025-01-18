<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

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
            $table->string('name');
            $table->string('username');
            $table->string('phone_no')->unique();
            $table->tinyInteger('status')->default('2')->comment('1 for active, 2 for unactive');
            $table->string('image')->nullable();
            $table->tinyInteger('type')->default('2')->comment('1 for admins, 2 for customers');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();

            $table->timestamps();
        });
        DB::statement('ALTER TABLE users ADD CONSTRAINT chk_user_type CHECK (type in(1, 2));');
        DB::statement('ALTER TABLE users ADD CONSTRAINT chk_user_status CHECK (status in(1, 2));');
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