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
        Schema::dropIfExists('posts');
        
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('title',255);
            /*$table->string('cat_parent_id',255);
            $table->string('cat_child_id',255);*/
            $table->text('desc')->nullable();
            $table->text('content')->nullable();
            $table->string('alias',150);//->unique();
            $table->string('img')->nullable();
            $table->string('author_id');

            //$table->foreign('author_id')->references('id')->on('users');

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
