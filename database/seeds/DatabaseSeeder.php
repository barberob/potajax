<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        /*$this->call(CountriesSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(SubCategoriesSeeder::class);
        $this->call(UnitsSeeder::class);*/

        //factory( App\Users\Moderator::class, 10)->create();
        //factory(App\Users\Manager::class, 10)->create();
        factory(App\User::class, 10)->create();

        //factory(App\Product::class, 10)->create();
    }
}
