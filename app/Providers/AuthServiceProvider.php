<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-product', function ($user, $product){
           return $user->is_admin == 1;
        });
        Gate::define('create-product', function ($user){
           return $user->is_admin == 1;
        });
        Gate::define('destroy-product', function ($user, $product){
           return $user->is_admin == 1;
        });
        Gate::define('update-category', function ($user, $category){
           return $user->is_admin == 1;
        });
        Gate::define('create-category', function ($user){
           return $user->is_admin == 1;
        });
        Gate::define('destroy-category', function ($user, $category){
           return $user->is_admin == 1;
        });
        Gate::define('edit-image', function ($user, $products){
           return $user->is_admin == 1;
        });
        Gate::define('destroy-image', function ($user, $image){
           return $user->is_admin == 1;
        });
        Gate::define('create-image', function ($user, $product){
           return $user->is_admin == 1;
        });
    }
}
