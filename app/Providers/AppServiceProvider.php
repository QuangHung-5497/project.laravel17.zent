<?php

namespace App\Providers;
use View;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;

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
    public function boot()
    {
        
        $cate=Category::where('deleted_at', NULL)->get();
        Cache::put('cate',$cate,60*60);
        $categories = Cache::remember('cate',60, function() {
            return $categories=Category::get();
        });
        View::share('categories', $categories );

    }
}
