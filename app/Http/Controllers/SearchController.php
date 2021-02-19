<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function get(Request $request)
    {

        $search = $request->input('search');
        //dd($search);
        if (isset($search) && !empty($search)) {
            $resultat = SearchController::Find($search, 0);
        }
        dd($resultat);

    }

    public function Find($laRecherche, $etat)
    {
        $res = null;
        //$laRecherche = "Royce Smith DDS";

        //nom shop
        $resultat = DB::table('shops')->
        where('shops.nom', 'Like', $laRecherche)->
        get();
        if (empty($resultat[0])) {
            $resultat = DB::table('categories')->
            where('categories.libelle', 'Like', $laRecherche)->
            get();
            if (empty($resultat[0])) {
                $resultat = DB::table('subcategories')->
                where('subcategories.libelle', 'Like', $laRecherche)->
                get();
                if (empty($resultat[0])) {
                    $resultat = SearchController::API($laRecherche);
                }
            }
        }


        return $resultat;
    }
    public function API($laRecherche){
        $query = $laRecherche;
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            [
                CURLOPT_URL => "http://api-adresse.data.gouv.fr/search/?q=". urlencode($query),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_POSTFIELDS => "",
            ]
        );

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            abort(403);
        } else {
            return json_decode($response)->features[0];
        }
    }
}
