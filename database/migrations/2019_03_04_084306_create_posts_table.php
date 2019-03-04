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
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('subtitle');
            $table->text('content');
            $table->string('page_image')->nullable();
            $table->integer('view_count')->unsigned()->default(0)->index();
            $table->string('meta_description')->nullable();
            $table->boolean('is_draft')->default(false);
            $table->boolean('is_original')->default(false);
            $table->integer('category_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('last_user_id')->unsigned();
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
