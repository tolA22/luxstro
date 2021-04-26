<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    protected $repositories = ['User','Space','PropertyType','PropertyGuest','Media','ApartmentInfo','Amenity'];
    
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
        //bind the repositories
        foreach($this->repositories as $repository){
            $this->app->bind(
                "App\\Repositories\\$repository\\$repository"."RepositoryInterface",
                "App\\Repositories\\$repository\\$repository"."Repository"
            );
        }
    }
}
