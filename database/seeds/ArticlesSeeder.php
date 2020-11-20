<?php

use App\Articles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      // DB::insert('INSERT INTO articles (nombre, precio, existencia)
      // VALUES (:nombre, :precio, :existencia)' ,[
      // 'nombre' => 'Vacuna3',
      // 'precio' => '300',
      // 'existencia' => '1'
      //   ]);

      Articles::create([
        'nombre' => 'Vacuna3',
        'precio' => '300',
        'existencia' => '1'
      ]);

      // factory(articles::class, 48)->create();

      Articles::create([
        'nombre' => 'Vacuna',
        'precio' => '200',
        'existencia' =>'5'
      ]);

      Articles::create([
        'nombre' => 'Correa',
        'precio' => '100',
        'existencia' =>'10'
      ]);

      // DB::table('articles')->insert([
      //   'nombre' => 'Shampoo',
      //   'precio' => '70',
      //   'existencia' =>'15'
      // ]);
    }
}
