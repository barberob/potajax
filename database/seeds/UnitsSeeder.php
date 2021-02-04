<?php

use Illuminate\Database\Seeder;

class UnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lot_id = DB::table('units')->insertGetId([
            'libelle'=> 'Pièce'
        ]);
        $kilo_id = DB::table('units')->insertGetId([
            'libelle'=> 'Kg'
        ]);
        $litre_id = DB::table('units')->insertGetId([
            'libelle'=> 'L'
        ]);
        $mili_litre_id = DB::table('units')->insertGetId([
            'libelle'=> 'mL'
        ]);
    }
}
