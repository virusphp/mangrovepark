<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
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
    	DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table('users')->truncate();

        //buat facker dulu
        $faker = Factory::create();
        // generate 3 user atau author
        DB::table('users')->insert([
        	[
        		'name' => "Jono Bae",
                'slug' => "jono-bae",
        		'email' => "jon@test.com",
        		'password' => bcrypt('rahasia'),
                'bio' => $faker->text(rand(250, 300))
        	],
        	[
        		'name' => "Gandi tok",
                'slug' => "gandi-tok",
        		'email' => "gandi@test.com",
        		'password' => bcrypt('rahasia'),
                'bio' => $faker->text(rand(250, 300))
        	],
        	[
        		'name' => "Ummi gan",
                'slug' => "ummi-gan",
        		'email' => "ummi@test.com",
        		'password' => bcrypt('rahasia'),
                'bio' => $faker->text(rand(250, 300))
        	],
    	]);
    }
}
