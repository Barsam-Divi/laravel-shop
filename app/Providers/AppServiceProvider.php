<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\category;
use App\Observers\CategoryObserver;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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


        \view()->composer(['client.*'],function ($view)
        {
            $view->with([
                'categories' => category::query()->where('parent_id',null)->get(),
                'brands' => Brand::all()
            ]);
        });

        category::observe(CategoryObserver::class);

    }
}
