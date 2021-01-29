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
            'libCategorie'=> 'Restaurant'
        ]);
        $epicerie_id =DB::table('categories')->insertGetId([
            'libCategorie'=> 'Epicerie'
        ]);
        $boucherie_id =DB::table('categories')->insertGetId([
            'libCategorie'=> 'Boucherie'
        ]);
        $primeur_id =DB::table('categories')->insertGetId([
            'libCategorie'=> 'Primeur'
        ]);
        $bio_id =DB::table('categories')->insertGetId([
            'libCategorie'=> 'Bio'
        ]);
        $animalerie_id =DB::table('categories')->insertGetId([
            'libCategorie'=> 'Animalerie'
        ]);
        $sport_id =DB::table('categories')->insertGetId([
            'libCategorie'=> 'Sport'
        ]);
    }
}
