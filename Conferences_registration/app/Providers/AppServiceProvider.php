<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Conference; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Bendrinti $conferences visiems vaizdams
        view()->share('conferences', Conference::all()); // Pridedate konferencijų sąrašą visiems vaizdams
    }
}
