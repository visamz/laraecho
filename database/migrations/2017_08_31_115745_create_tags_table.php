<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->default(0);
            $table->string('name', 200)->index('idx_name');
            $table->string('slug', 200)->unique('idx_slug');
            $table->string('description')->nullable();
            $table->string('feature_image')->nullable();
            $table->unsignedInteger('post_count')->default(0)->index('idx_post_count');
            $table->unsignedInteger('sort')->default(0);
            $table->enum('visibility', ['public', 'internal'])->default('public');
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
        Schema::dropIfExists('tags');
    }
}
