<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Student::class, 25)
            ->create();

        $admin = new \App\Student();

        $nickname = "admin";
        $name = "admin";
        $flag = "SG";

        $email = "admin@cs3226.lab.com";
        $password = bcrypt('cs3226.lab@admin');
        $remember_token = str_random('10');

        $admin->nickname = $nickname;
        $admin->access = "admin";
        $admin->name = $name;
        $admin->flag = $flag;
        $admin->email = $email;
        $admin->password = $password;
        $admin->remember_token = $remember_token;

        $admin->save();

    }
}
