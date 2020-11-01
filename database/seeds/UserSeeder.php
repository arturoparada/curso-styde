<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
Use App\Profession;
use App\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$professions = DB::select('SELECT id FROM professions WHERE title = ?', ['Desarrollador back-end']);

        //$professions = DB::table ('professions')->select('id')->take(1)->get();
        //$profession = DB::table ('professions')->select('id')->first();

        $professionID = \App\Profession::where('title', 'Desarrollador back-end')->value('id');

        /*User::create([
          'name'=> 'Alan Turing',
          'email'=>'alant@hotmail.com',
          'password'=> bcrypt('laravel'),
          'phone'=> '6622122823',
          'profession_id' => $professionID,
          'is_admin' => true,
        ]);*/

        factory(User::class) -> create([
          //'name'=> 'Alan Turing',
          'email'=>'alant@hotmail.com',
          'password'=> bcrypt('laravel'),
          //'phone'=> '6622122823',
          'profession_id' => $professionID,
          'is_admin' => true,
        ]);

        factory(User::class)->create([
          'profession_id' => $professionID
        ]);

       factory(User::class, 48)->create();

        /*User::create([
          'name' => 'Ada Lovelace',
          'email' => 'alove@gmail.com',
          'password' => bcrypt('laragon'),
          'phone' => '6622134589',
          'profession_id' => $professionID
        ]);

        User::create([
          'name'=> 'John Doe',
          'email'=>'jd@hotmail.com',
          'password'=> bcrypt('laravel'),
          'phone'=> '6622334455',
          'profession_id' => $professionID
        ]);

        User::create([
          'name'=> 'Jenn Doe',
          'email'=>'jedoe@hotmail.com',
          'password'=> bcrypt('laravel'),
          'phone'=> '6625122823',
          'profession_id' => NULL
        ]);*/

        /*DB::insert('INSERT INTO users (name, email, password, phone, profession_id)
        VALUES (:name, :email, :password, :phone, :profession_id)',[
          'name' => 'Ada Lovelace',
          'email' => 'alove@gmail.com',
          'password' => bcrypt('laragon'),
          'phone' => '6622134589',
          'profession_id' => $professionID
        ]);*/
    }
  }
