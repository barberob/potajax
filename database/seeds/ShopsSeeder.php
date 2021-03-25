<?php

use Illuminate\Database\Seeder;

class ShopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s1 = DB::table('shops')->insert([
            'nom' => 'Le Resto',
            'adresse' => 'Rue Saint-Thomas',
            'numRue' => '6',
            'cp' => '30000',
            'lat' => '43.8355623',
            'lng' => '4.3618004',
            'descriptif' => 'Dans un décor moderne, sobre et élégant, ce restaurant sert une cuisine du marché raffinée et soignée.',
            'tel' => '04662118012',
            'prefixeTel' => '+33',
            'email' => 'info@leresto-nimes.com',
            'siret' => '36552287900034',
            'horaires' => 'Du lundi au vendredi : 12h00 - 14h00, Fermé les week-ends',
            'etat' => 1,
            'codeNote' => '',
            'user_id' => '2',
            'city_id' => '30189',
            'subcategory_id' => 4,
            'category_id' => 1,

        ]);
        $s2 = DB::table('shops')->insert([
            'nom' => 'A Funtana',
            'adresse' => 'Imm. Cyrnos Place Marcha',
            'numRue' => '1',
            'cp' => '20260',
            'lat' => '42.5499677',
            'lng' => '8.726087',
            'descriptif' => 'Perché sur une placette arborée en plein cœur de Calvi, A Funtana bénéficie d\'un cadre exceptionnel avec vue imprenable sur le clocher de l\'Eglise Sainte Marie Majeure. A l\'intérieur, lumières tamisées et cuisine ouverte pour une ambiance cosy. La cave à vin vitrée vous invite à la dégustation.',
            'tel' => '0495650952',
            'prefixeTel' => '+33',
            'email' => 'contact@restaurantafuntana.com',
            'siret' => '36652287900034',
            'horaires' => 'Du lundi au dimanche : 12h00 - 14h30 / 19h15 - 23h00',
            'etat' => 1,
            'codeNote' => '',
            'user_id' => '3',
            'city_id' => '2B050',

            'category_id' => 1

        ]);
        $s3 = DB::table('shops')->insert([
            'nom' => 'Day by day',
            'adresse' => 'Place Jean Marcellin',
            'numRue' => '9',
            'cp' => '05000',
            'lat' => '44.5587798',
            'lng' => '6.0794775',
            'descriptif' => 'Epicerie vrac',
            'tel' => '0492579897',
            'prefixeTel' => '+33',
            'email' => 'daybyday.gap@gmail.com',
            'siret' => '36562287900035',
            'horaires' => 'Du mardi au samedi : 09h30 - 13h30 / 14h30 - 19h00.Fermé les dimanches et lundis.',
            'etat' => 1,
            'codeNote' => '',
            'user_id' => '2',
            'city_id' => '05061',

            'category_id' => 2

        ]);
        $s4 = DB::table('shops')->insert([
            'nom' => 'L\'Annexe',
            'adresse' => 'Avenue d\'Embrun',
            'numRue' => '89',
            'cp' => '05000',
            'lat' => '44.5392223',
            'lng' => '6.0382816',
            'descriptif' => 'Burger, cuisine bistro et spécialités locales dans une chaîne de brasseries-pubs au décor anglo-saxon rétro',
            'tel' => '0492485040',
            'prefixeTel' => '+33',
            'email' => 'contact@restaurant-lannexe-gap.fr',
            'siret' => '36562287900034',
            'horaires' => 'Du lundi au jeudi : 11h45 - 14h00, du vendredi au samedi : 11h45 - 14h00 / 18h45 - 22h30. Fermé les dimanches.',
            'etat' => 1,
            'codeNote' => '',
            'user_id' => '3',
            'city_id' => '05061',
            'subcategory_id' => 4,
            'category_id' => 1

        ]);
        $s5 = DB::table('shops')->insert([
            'nom' => 'L\'Epicerie de Nimes',
            'adresse' => 'Rue de l\'Agau',
            'numRue' => '14',
            'cp' => '30000',
            'lat' => '43.8395595',
            'lng' => '4.3571321',
            'descriptif' => 'Nos paniers Gourmands en circuit court: Nîmes, Gard, Ardèche. Cave bio et produits première fraicheur.',
            'tel' => '0952144065',
            'prefixeTel' => '+33',
            'email' => 'contact@epicerie-nimes.fr',
            'siret' => '46562287900034',
            'horaires' => 'Du mardi au samedi : 09h00 - 13h00 / 15h00 - 19h30. Fermé les dimanches et lundis.',
            'etat' => 1,
            'codeNote' => '',
            'user_id' => '2',
            'city_id' => '30189',

            'category_id' => 2

        ]);
        $s6 = DB::table('shops')->insert([
            'nom' => 'Thanh Binh',
            'adresse' => 'Rue Lagrange',
            'numRue' => '18',
            'cp' => '75005',
            'lat' => '48.8503793',
            'lng' => '2.3483148',
            'descriptif' => 'Petite épicerie important des produits frais, surgelés et sous vide du Japon, du Vietnam et de la Thaïlande.',
            'tel' => '014354661',
            'prefixeTel' => '+33',
            'email' => 'info@thanh-binh.fr',
            'siret' => '56562287900034',
            'horaires' => 'Du lundi au samedi : 9h30 - 20h00. Fermé les dimanches.',
            'etat' => 1,
            'codeNote' => '',
            'user_id' => '3',
            'city_id' => '75105',
            'subcategory_id' => 6,
            'category_id' => 2

        ]);
        $s7 = DB::table('shops')->insert([
            'nom' => 'Boucherie du Lez',
            'adresse' => 'Avenue de la Pompignane',
            'numRue' => '1603',
            'cp' => '34000',
            'lat' => '43.6205662',
            'lng' => '3.8971249',
            'descriptif' => 'Un couple de boucher chaleureux et passionné !',
            'tel' => '0467552368',
            'prefixeTel' => '+33',
            'email' => 'laboucheriedulez@outlook.com',
            'siret' => '66562287900034',
            'horaires' => 'Du mardi au samedi : 07h00 - 18h00, le dimanche : 08h30 - 12h30. Fermé les lundis.',
            'etat' => 1,
            'codeNote' => '',
            'user_id' => '2',
            'city_id' => '34172',

            'category_id' => 3

        ]);
        $s8 = DB::table('shops')->insert([
            'nom' => 'Alpes Viandes 05',
            'adresse' => 'Rue Pasteur',
            'numRue' => '14',
            'cp' => '05000',
            'lat' => '44.5527009',
            'lng' => '6.0611131',
            'descriptif' => 'Alpes Viandes 08 Boucherie-charcuterie halal',
            'tel' => '0492462397',
            'prefixeTel' => '+33',
            'email' => 'contact@alpes-viandes-05.com',
            'siret' => '76562287900034',
            'horaires' => 'Du mardi au samedi : 08h30 - 13h00 / 15h00 - 19h30. Fermé les lundis et dimanches.',
            'etat' => 1,
            'codeNote' => '',
            'user_id' => '3',
            'city_id' => '05061',
            'subcategory_id' => 3,
            'category_id' => 3

        ]);
        $s9 = DB::table('shops')->insert([
            'nom' => 'Le Primeur à domicile',
            'adresse' => 'Cour Astier',
            'numRue' => '1',
            'cp' => '07400',
            'lat' => '44.5493914',
            'lng' => '4.6814172',
            'descriptif' => 'Des fruits et des légumes frais',
            'tel' => '0768111838',
            'prefixeTel' => '+33',
            'email' => 'leprimeuradomicile@gmail.com',
            'siret' => '86562287900034',
            'horaires' => 'Du mardi au dimanche : 09h30 - 18h00. Fermé les lundis.',
            'etat' => 1,
            'codeNote' => '',
            'user_id' => '2',
            'city_id' => '07319',

            'category_id' => 4

        ]);
        $s10 = DB::table('shops')->insert([
            'nom' => 'Mas Guérido primeur',
            'adresse' => 'Avenue André Ampère',
            'numRue' => '15',
            'cp' => '66330',
            'lat' => '42.6891246',
            'lng' => '2.9196605',
            'descriptif' => 'Nous sommes  un magasin de proximité, situé en pleine zone commerciale du Mas Guérido, spécialisés en produits frais, les fruits et légumes, ainsi que dans les fruits et légumes Bio , issus de l\'agriculture biologique.',
            'tel' => '0986386266',
            'prefixeTel' => '+33',
            'email' => 'contact@MGPrimeur.com',
            'siret' => '86562287900035',
            'horaires' => 'Du lundi au samedi : 09h00 - 17h30. Fermé les dimanches.',
            'etat' => 1,
            'codeNote' => '',
            'user_id' => '3',
            'city_id' => '66028',

            'category_id' => 4

        ]);
        $s11 = DB::table('shops')->insert([
            'nom' => 'Tiliem | Primeur Toulousain',
            'adresse' => 'Chemin de la Plaine des Lacs',
            'numRue' => '4',
            'cp' => '31120',
            'lat' => '43.5069078',
            'lng' => '1.3459699',
            'descriptif' => 'Tiliem votre primeur 2.0 vous livre fruits et légumes à Toulouse et ses alentours. Essentiellement issu de l’agriculture locale et livré localement nous vous garantissons, la fraicheur et la qualité de chaque produit ! La majeure partie de nos produits provient du Sud-Ouest de la France, dans la mesure du possible mais également, pour certains produits spécifiques d’autres régions du monde !
            En plus de notre vaste sélection de fruits, légumes et plantes aromatiques nous vous préparons des paniers surprises, à prix mini, allant de 3 à 9kg, l’idéal pour les familles, ceux-ci allient variété, qualité et petit prix !
            Profitez de notre large sélection de fruits et légumes, plantes aromatiques d’ici ou d’ailleurs et préparez vos meilleures recettes. Faites-le choix de la qualité !',
            'tel' => '0780489396',
            'prefixeTel' => '+33',
            'email' => 'contact@tiliem.fr',
            'siret' => '86562287900036',
            'horaires' => 'Ouvert 24h/24, 7 jours sur 7.',
            'etat' => 1,
            'codeNote' => '',
            'user_id' => '2',
            'city_id' => '31458',

            'category_id' => 4

        ]);
        $s12 = DB::table('shops')->insert([
            'nom' => 'Magasin emile Noël | L\'Epicier Bio',
            'adresse' => 'Rue Dr Samuel Hahnemann',
            'numRue' => '',
            'cp' => '30130',
            'lat' => '44.2512454',
            'lng' => '4.6407015',
            'descriptif' => 'Le magasin Emile Noël, L’épicier Bio, vous propose plus de 300 références pour votre shopping bio à Pont-Saint-Esprit !

            Retrouvez tous nos produits Emile Noël, nos huiles vierges, nos spécialités méridionales, nos condiments, … et toute la gamme des produits d’hygiène Emma Noël.
            Vous y trouverez également les grandes marques du bio avec les compléments alimentaires et de nombreux produits d’épicerie bio.

            Nous préparons également pour vous de merveilleux coffrets cadeaux.',
            'tel' => '0466907328',
            'prefixeTel' => '+33',
            'email' => 'commande@emilenoel.com',
            'siret' => '86562287900037',
            'horaires' => 'Du lundi au samedi : 09h00 - 12h00 / 14h30 - 18h30. Fermé les dimanches.',
            'etat' => 1,
            'codeNote' => '',
            'user_id' => '3',
            'city_id' => '30202',

            'category_id' => 5

        ]);
        $s13 = DB::table('shops')->insert([
            'nom' => 'Maxi Zoo Avignon - Mistral 7',
            'adresse' => 'Avenue Pierre Bérégovoy, Centre Commercial Mistral 7',
            'numRue' => '',
            'cp' => '84140',
            'lat' => '43.9224634',
            'lng' => '4.86586',
            'descriptif' => 'Chaîne d\'animalerie proposant produits alimentaires, équipements et accesoires pour animaux, dont reptiles.',
            'tel' => '0432448574',
            'prefixeTel' => '+33',
            'email' => 'contact@maxizoo.fr',
            'siret' => '86562287900038',
            'horaires' => 'Du lundi au samedi : 09h30 - 12h30 / 14h00 - 19h00. Fermé les dimanches.',
            'etat' => 1,
            'codeNote' => '',
            'user_id' => '2',
            'city_id' => '84007',

            'category_id' => 6

        ]);
        $s14 = DB::table('shops')->insert([
            'nom' => 'Centre Equestre Le Mazet',
            'adresse' => 'Mazet',
            'numRue' => '',
            'cp' => '07700',
            'lat' => '44.3352081',
            'lng' => '4.5254515',
            'descriptif' => 'Au coeur du site grandiose des Gorges de l\'Ardèche, sur plus de 100 hectares de nature, Le Mazet vous propose toute l\'équitation de loisir ainsi qu\'un hébergement en gîte d\'étape ou camping.',
            'tel' => '0475988551',
            'prefixeTel' => '+33',
            'email' => 'fred@lemazet.fr',
            'siret' => '86562287900039',
            'horaires' => 'Tous les jours, de 9h30 à 18h00.',
            'etat' => 1,
            'codeNote' => '',
            'user_id' => '3',
            'city_id' => '07034',

            'category_id' => 7

        ])
    ;
    }
}
