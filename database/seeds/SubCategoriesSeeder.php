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
            'libSubCategorie'=> 'Asiatique'
        ]);
        $fastFood_id =DB::table('subcategories')->insertGetId([
            'libSubCategorie'=> 'Fast Food'
        ]);
        $hallal_id =DB::table('subcategories')->insertGetId([
            'libSubCategorie'=> 'Hallal'
        ]);
        $francais_id =DB::table('subcategories')->insertGetId([
            'libSubCategorie'=> 'Français'
        ]);
        $italien_id =DB::table('subcategories')->insertGetId([
            'libSubCategorie'=> 'Italien'
        ]);
        
    }
}
