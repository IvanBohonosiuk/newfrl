<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('login');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birthday');
            $table->string('image')->default('default.jpg');
            $table->string('phone')->nullable();
            $table->text('about');
            $table->text('citate');
            $table->string('status');
            $table->string('web-site');
            $table->string('icq');
            $table->string('skype');
            $table->string('pay_card_pb')->nullable();
            $table->string('pay_card_2')->nullable();
            $table->string('webmoney_id')->nullable();
            $table->string('wmz')->nullable();
            $table->string('ee')->nullable();
            $table->string('okpay')->nullable();
            $table->text('resume');
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
        Schema::drop('users');
    }
}
