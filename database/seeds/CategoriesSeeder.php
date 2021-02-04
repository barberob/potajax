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
            'libelle'=> 'Restaurant'
        ]);
        $epicerie_id =DB::table('categories')->insertGetId([
            'libelle'=> 'Epicerie'
        ]);
        $boucherie_id =DB::table('categories')->insertGetId([
            'libelle'=> 'Boucherie'
        ]);
        $primeur_id =DB::table('categories')->insertGetId([
            'libelle'=> 'Primeur'
        ]);
        $bio_id =DB::table('categories')->insertGetId([
            'libelle'=> 'Bio'
        ]);
        $animalerie_id =DB::table('categories')->insertGetId([
            'libelle'=> 'Animalerie'
        ]);
        $sport_id =DB::table('categories')->insertGetId([
            'libelle'=> 'Sport'
        ]);
    }
}
