<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitChart extends BaseChart
{
    public ?string $name = 'visit_chart';

    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        //$labels = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

        //$nbVisits = count(DB::table('visits')->where('shop_id', '=', $_GET['id'])->get());

        //$month = date("m", strtotime(now()));

        //$visits = DB::table('visits')->where('shop_id', '=', $_GET['id'])->and('created_at', 'like', '_____'.$month.'%');

        // $lastDate = strtotime(now())-2628000;
        // $date = strtotime(now());
        // $nextDate = strtotime(now())+2628000;

        // $lastMonth = date("F", $lastDate);
        // $month = date("F", $date);
        // $nextMonth = date("F", $nextDate);

        // $labels = [$lastMonth, $month, $nextMonth];

        /*return Chartisan::build()
            ->labels($labels)
            ->dataset('Nombre de visites', [$nbVisits, 6, 18, 2, 4, 16, 0, 7, 80, 150, 5, 87]);*/
    }
}