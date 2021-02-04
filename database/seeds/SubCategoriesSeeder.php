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
            'libelle'=> 'Asiatique',
            'Category_id'=> '1'
        ]);
        $fastFood_id =DB::table('subcategories')->insertGetId([
            'libelle'=> 'Fast Food',
            'Category_id'=> '1'
        ]);
        $hallal_id =DB::table('subcategories')->insertGetId([
            'libelle'=> 'Hallal',
            'Category_id'=> '3'
        ]);
        $francais_id =DB::table('subcategories')->insertGetId([
            'libelle'=> 'Français',
            'Category_id'=> '1'
        ]);
        $italien_id =DB::table('subcategories')->insertGetId([
            'libelle'=> 'Italien',
            'Category_id'=> '1'
        ]);
        $orientale_id =DB::table('subcategories')->insertGetId([
        	'libelle' => 'Orientale',
        	'Category_id' => '2'
        ]);

    }
}
