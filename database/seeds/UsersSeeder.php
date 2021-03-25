<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = DB::table('users')->insert([
            'nom' => 'Monsieur',
            'prenom' => 'Michel',
            'email' => 'client@gmail.com',
            'password' => 'client123client',
            'prefixtel' => '+33',
            'tel' => '0466853375',
            'role' => 1
        ]);

        $c1 = DB::table('users')->insert([
            'nom' => 'Monsieur',
            'prenom' => 'Commerçant',
            'email' => 'commercant@gmail.com',
            'password' => 'commerçant123commerçant',
            'prefixtel' => '+33',
            'tel' => '0466853376',
            'role' => 2
        ]); 

        $c2 = DB::table('users')->insert([
            'nom' => 'Madame',
            'prenom' => 'Commerçante',
            'email' => 'commercante@gmail.com',
            'password' => 'commerçante123commerçante',
            'prefixtel' => '+33',
            'tel' => '0466853377',
            'role' => 2
        ]);
        $c3 = DB::table('users')->insert([
            'nom' => 'Monsieur',
            'prenom' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin123admin',
            'prefixtel' => '+33',
            'tel' => '0466853378',
            'role' => 4
        ]);
        $c4 = DB::table('users')->insert([
            'nom' => 'Monsieur',
            'prenom' => 'Moderateur',
            'email' => 'moderateur@gmail.com',
            'password' => 'moderateur123moderateur',
            'prefixtel' => '+33',
            'tel' => '0466853379',
            'role' => 3
        ]);
    }
}
