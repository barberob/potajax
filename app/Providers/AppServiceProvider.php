<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use ConsoleTVs\Charts\Registrar as Charts;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {
        Schema::defaultStringLength(191);

        //ajout de directives blade

        Blade::if('logged', function () {
            return Auth::check();
        });

        Blade::if('manager', function () {
            return Auth::check() && Auth::user()->role == User::MANAGER;
        });

        Blade::if('user', function () {
            return Auth::check() && Auth::user()->role == User::USER;
        });

        Blade::if('moderator', function () {
            return Auth::check() && Auth::user()->role == User::MODERATOR;
        });

        $charts->register([\App\Charts\VisitChart::class]);

        // pour connecté / deconnecté
        //@auth
        //@guest
    }
}
