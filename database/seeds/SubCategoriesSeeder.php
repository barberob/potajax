<?php

use Illuminate\Database\Seeder;

class SubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $asiatique_id = DB::table('subcategories')->insertGetId([
            'libSubCat'=> 'Asiatique',
            'Categorie_id'=> '1'
        ]);
        $fastFood_id =DB::table('subcategories')->insertGetId([
            'libSubCat'=> 'Fast Food',
            'Categorie_id'=> '1'
        ]);
        $hallal_id =DB::table('subcategories')->insertGetId([
            'libSubCat'=> 'Hallal',
            'Categorie_id'=> '3'
        ]);
        $francais_id =DB::table('subcategories')->insertGetId([
            'libSubCat'=> 'Français',
            'Categorie_id'=> '1'
        ]);
        $italien_id =DB::table('subcategories')->insertGetId([
            'libSubCat'=> 'Italien',
            'Categorie_id'=> '1'
        ]);

        $orientale_id =DB::table('subcategories')->insertGetId([
        	'libSubCat' => 'Orientale',
        	'Categorie_id' => '2'
        ]);
        
    }
}
