<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'name'=> 'Alan Turing',
          'email'=>'alant@hotmail.com',
          'password'=> bcrypt('laravel'),
          'phone'=> '6622122823',
        ]);
    }
}
