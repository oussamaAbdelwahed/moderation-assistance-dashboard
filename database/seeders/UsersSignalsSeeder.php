<?php

namespace Database\Seeders;

use App\Models\BlogUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSignalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //this results up a creation of 100 records in the user_signals  
        //pivot table and 200 records in blog_users table
        for($i=0;$i<100;$i++){
           DB::connection("mysql2")->table("user_signals")->insert([
            "user_id" => BlogUser::factory()->create()->id,
            "signaled_id" => BlogUser::factory()->create()->id,
            "created_at" => now()->addSeconds($i)
           ]);
        }
    }
}
