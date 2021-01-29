<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurant_id = DB::table('categories')->insertGetId([
            'libCat'=> 'Restaurant'
        ]);
        $epicerie_id =DB::table('categories')->insertGetId([
            'libCat'=> 'Epicerie'
        ]);
        $boucherie_id =DB::table('categories')->insertGetId([
            'libCat'=> 'Boucherie'
        ]);
        $primeur_id =DB::table('categories')->insertGetId([
            'libCat'=> 'Primeur'
        ]);
        $bio_id =DB::table('categories')->insertGetId([
            'libCat'=> 'Bio'
        ]);
        $animalerie_id =DB::table('categories')->insertGetId([
            'libCat'=> 'Animalerie'
        ]);
        $sport_id =DB::table('categories')->insertGetId([
            'libCat'=> 'Sport'
        ]);
    }
}
