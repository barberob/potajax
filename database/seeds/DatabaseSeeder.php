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

        $this->call(CountriesSeeder::class);

        $this->call(CategoriesSeeder::class);

        $this->call(SubCategoriesSeeder::class);

        $this->call(UnitsSeeder::class);

        factory(App\Moderator::class, 10)->create();

        factory(App\Manager::class, 10)->create();

        //factory(App\Product::class, 10)->create();
    }
}
