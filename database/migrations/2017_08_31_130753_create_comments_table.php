<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('post_id')->index('idx_post_id')->default(0);
            $table->unsignedInteger('author_id')->default(0);
            $table->unsignedInteger('owner_id')->default(0);
            $table->unsignedInteger('parent_id')->default(0);
            $table->string('author', 200);
            $table->string('email', 200);
            $table->string('website')->nullable();
            $table->string('ip', 64);
            $table->string('agent', 200);
            $table->text('body');
            $table->enum('status', ['approved', 'waiting'])->default('waiting')->index('idx_status');
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
        Schema::dropIfExists('comments');
    }
}
