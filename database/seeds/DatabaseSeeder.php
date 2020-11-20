<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $this->truncateTables([
        'users',
        'professions',
        'articles'
      ]);
        // $this->call(UsersTableSeeder::class);
        $this->call(ProfessionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ArticlesSeeder::class);
    }

    protected function truncateTables(array $table)
    {
      DB::statement('SET FOREIGN_KEY_CHECKS = 0');

      foreach ($table as $table) {
        DB::table($table)->truncate();
      }

      DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
