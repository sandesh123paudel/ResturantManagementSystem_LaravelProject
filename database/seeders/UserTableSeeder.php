<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // DB::table('users')->insert([
        //     //Admin
        //     [
        //         'name'=> 'Admin',
        //         'email'=> 'sandeshpaudel0618@gmail.com',
        //         'phone'=>'9815555096',
        //         'role'=>'admin',
        //         'password'=> hash::make('password')

        //     ],

        //     //User
        //     [
        //         'name'=> 'Sandesh Paudel',
        //         'email'=> 'sandypoudel24@gmail.com',
        //         'phone'=>'9863464699',
        //         'role'=>'user',
        //         'password'=> hash::make('password')

        //     ],

        //     //User2

        //     [
        //         'name'=> 'Ramesh Acharya',
        //         'email'=> 'p.sandesh24@tbc.edu.np',
        //         'phone'=>'9815555097',
        //         'role'=>'user',
        //         'password'=> hash::make('password')

        //     ]


        // ]);
    }
}
