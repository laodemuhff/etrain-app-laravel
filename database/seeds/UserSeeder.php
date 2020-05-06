<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'admin', 
            'email'=>'admin@gmail.com', 
            'password'=>Hash::make('password'),
            'role'=>'admin'
        ]);

        User::create([
            'name'=>'farhan', 
            'email'=>'ldmuhfarhanf@gmail.com', 
            'password'=>Hash::make('password'),
            'role'=>'mentor'
        ]);

        User::create([
            'name'=>'kukuh', 
            'email'=>'kukuhpratama@gmail.com', 
            'password'=>Hash::make('password'),
            'role'=>'mentor'
        ]);

        User::create([
            'name'=>'ahmad fauzan', 
            'email'=>'ahmadfauzan@gmail.com', 
            'password'=>Hash::make('password'),
            'role'=>'trainee'
        ]);
    }
}
