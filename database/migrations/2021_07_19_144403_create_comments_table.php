<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('comments', function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedInteger("user_id");
            $table->unsignedInteger("post_id");
            $table->text("content");
            $table->timestamp("created_at")->useCurrent();;
            $table->foreign("user_id")
              ->references("id")->on("blog_users")
              ->onDelete("cascade");

            $table->foreign("post_id")
              ->references("id")->on("posts")
              ->onDelete("cascade");              
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->dropIfExists('comments');
    }
}
