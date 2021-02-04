<?php

use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Gap_id = DB::table('cities')->insertGetId([
            'city_id' => '1',
            'CP' => '05000',
            'nomCity' => 'Gap',
            'countries_id' => '75',
        ]);
        $Vey_id = DB::table('cities')->insertGetId([
            'city_id' => '2',
            'CP' => '05400',
            'nomCity' => 'Veynes',
            'countries_id' => '75',
        ]);
        $Mars_id = DB::table('cities')->insertGetId([
            'city_id' => '3',
            'CP' => '13000',
            'nomCity' => 'Marseille',
            'countries_id' => '75',
        ]);
        $Nime_id = DB::table('cities')->insertGetId([
            'city_id' => '4',
            'CP' => '30189',
            'nomCity' => 'Nîmes',
            'countries_id' => '75',
        ]);
    }
}
