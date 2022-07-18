<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
//     public function boot()
//     {
//         //
        
//     }

    public function boot(\Illuminate\Http\Request $request)
        {
           

            // other code
}
}
