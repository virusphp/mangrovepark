<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//truncate 
    	DB::table('roles')->truncate();

        // Membuat Admin Role
        $admin = new Role();
        $admin->name = "admin";
        $admin->display_name = "Sugandi";
        $admin->save();

        // membuat Editor Role
        $editor = new Role();
        $editor->name = "editor";
        $editor->display_name = "Editor";
        $editor->save();

        // membuat Author Role
        $author = new Role();
        $author->name = "author";
        $author->display_name = "Author";
        $author->save();

        // memasang role pada user
        $user1 = User::find(1);
        $user1->detachRole($admin);
        $user1->attachRole($admin);

        $user2 = User::find(2);
        $user2->detachRole($editor);
        $user2->attachRole($editor);


        $user3 = User::find(3);
        $user3->detachRole($author);
        $user3->attachRole($author);
    }
}
