<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//reset tabel user
    	DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        // generate 3 user atau author
        DB::table('users')->insert([
        	[
        		'name' => "JONO",
        		'email' => "jon@test.com",
        		'password' => bcrypt('rahasia')
        	],
        	[
        		'name' => "Gandi",
        		'email' => "gandi@test.com",
        		'password' => bcrypt('rahasia')
        	],
        	[
        		'name' => "Ummi",
        		'email' => "ummi@test.com",
        		'password' => bcrypt('rahasia')
        	],
    	]);
    }
}
