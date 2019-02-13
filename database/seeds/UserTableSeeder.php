<?php

class UserTableSeeder extends Seeder{
    public function run(){
        DB::table('users')->delete();
        User::create(array(
            'name' => 'Admin', 
            'username' => 'Admin',
            'email' => 'admin@iqofficesolution.co.za',
            'password' => Hash::make('Pass'),
            ));
    }
}