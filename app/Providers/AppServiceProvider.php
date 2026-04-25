<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\View;

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
        View::composer('*', function ($view) {

        $pendingCount = Pendaftar::where('status','pending')
            ->where('is_read',0)
            ->count();

        $view->with('pendingCount',$pendingCount);
    });
    }
}
