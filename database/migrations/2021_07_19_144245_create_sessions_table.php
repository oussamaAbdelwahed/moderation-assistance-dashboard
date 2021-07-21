<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('sessions', function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedInteger("user_id");
            $table->timestamp("opened_on")->useCurrent();
 
        });

        
        Schema::connection('mysql2')->table('sessions', function (Blueprint $table) {
           $table->foreign("user_id")
               ->references("id")
               ->on("blog_users")
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
        Schema::connection('mysql2')->dropIfExists('sessions');
    }
}
