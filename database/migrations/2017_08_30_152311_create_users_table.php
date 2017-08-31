<?php

use Illuminate\Support\Facades\Schema;
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
            $table->string('email', 200)->unique('idx_email');
            $table->string('name', 64)->unique('idx_name');
            $table->string('password', 64);
            $table->string('avatar_image')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('website')->nullable();
            $table->string('city', 32)->nullable();
            $table->string('company')->nullable();
            $table->string('introduction')->nullable();
            $table->string('wechatpay_qrcode')->nullable();
            $table->string('alipay_qrcode')->nullable();
            $table->string('wechat_qrcode')->nullable();
            $table->string('weibo')->nullable();
            $table->string('github')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('remember_token', 64)->nullable();
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
        Schema::dropIfExists('users');
    }
}
