<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categories')->truncate();
        //memasukan data ke database
        DB::table('categories')->insert([
        		[
        			'title' => 'Web Desain',
        			'slug' => 'web-desain'
        		],
        		[
        			'title' => 'Web Programing',
        			'slug' => 'web-web-programing'
        		],
        		[
        			'title' => 'Networking',
        			'slug' => 'networking'
        		],
        		[
        			'title' => 'Sosial Marketing',
        			'slug' => 'social-marketing'
        		],
        		[
        			'title' => 'Pengusaha',
        			'slug' => 'pengusaha'
        		],
        	]);

        //update data post
        
        
        for ($post_id = 1; $post_id <= 10; $post_id++)
        {
        	$category_id = rand(1, 5);
        	DB::table('posts')	
        		->where('id', $post_id)	
        		->update(['category_id' => $category_id]);
        }
    }
}
