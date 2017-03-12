<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	   DB::table('permissions')->truncate();
         
        // membuat ijin crud post
        $crudPost = new Permission();
        $crudPost->name = "crud-post";
        $crudPost->save();

        // membuat ijin update post lain
        $updateOtherPost = new Permission();
        $updateOtherPost->name = "update-other-post";
        $updateOtherPost->save();

        // membuat ijin delete post lain
        $deleteOtherPost = new Permission();
        $deleteOtherPost->name = "delete-other-post";
        $deleteOtherPost->save();
       
        // membuat ijin crud kategori
       	$crudCategory = new Permission();
       	$crudCategory->name = "crud-category";
       	$crudCategory->save();

        // membuat ijin crud user
        $crudUser = new Permission();
       	$crudUser->name = "crud-user";
       	$crudUser->save();

       	// memasangkan roles permision
       	$admin = Role::whereName('admin')->first();
       	$editor = Role::whereName('editor')->first();
       	$author = Role::whereName('author')->first();

       	$admin->detachPermissions([$crudPost, $updateOtherPost, $deleteOtherPost, $crudCategory, $crudUser]);
       	$admin->attachPermissions([$crudPost, $updateOtherPost, $deleteOtherPost, $crudCategory, $crudUser]);

       	$editor->detachPermissions([$crudPost, $updateOtherPost, $deleteOtherPost, $crudCategory]);
       	$editor->attachPermissions([$crudPost, $updateOtherPost, $deleteOtherPost, $crudCategory]);

       	$author->detachPermissions([$crudPost]);
       	$author->attachPermissions([$crudPost]);
    }
}
