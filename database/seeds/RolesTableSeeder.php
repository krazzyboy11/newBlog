<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        $admin = new Role();
        $admin->name = "admin";
        $admin->display_name = "Admin";
        $admin->save();

        $editor = new Role();
        $editor->name = "editor";
        $editor->display_name = "Editor";
        $editor->save();

        $author = new Role();
        $author->name = "author";
        $author->display_name = "Author";
        $author->save();

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
