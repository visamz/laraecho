<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->default(0)->index();
            $table->string('title', 200);
            $table->string('slug', 200)->unique();
            $table->string('feature_image')->nullable();
            $table->text('custom_excerpt');
            $table->text('body');
            $table->enum('type', ['post', 'page'])->default('post');
            $table->unsignedInteger('view_count')->default(0)->index();
            $table->unsignedInteger('vote_count')->default(0)->index();
            $table->unsignedInteger('comment_count')->default(0)->index();
            $table->enum('status', ['publish', 'waiting', 'draft'])->default('publish')->index();
            $table->enum('allow_comment', ['yes', 'no'])->default('yes');
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
        Schema::dropIfExists('posts');
    }
}
