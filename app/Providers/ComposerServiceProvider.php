<?php

namespace App\Providers;

use App\Http\ViewComposers\AdminnameComposer;
use App\http\ViewComposers\CategoryComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
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
    public function boot()
    {
        // Using class based composers...
        View::composer('incs.navbar', CategoryComposer::class);
        View::composer('admin.inc.sidebar', AdminnameComposer::class);
        // Using closure based composers...
        // View::composer('dashboard', function ($view) {
        //     //
        // });
    }
}
