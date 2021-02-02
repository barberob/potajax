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
            'libUnit'=> 'Pièce'
        ]);
        $kilo_id = DB::table('units')->insertGetId([
            'libUnit'=> 'Kg'
        ]);
        $litre_id = DB::table('units')->insertGetId([
            'libUnit'=> 'L'
        ]);
        $mili_litre_id = DB::table('units')->insertGetId([
            'libUnit'=> 'mL'
        ]);
    }
}
