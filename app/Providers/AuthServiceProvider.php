<?php

namespace App\Providers;

use App\Menu;
use App\Alumno;
use App\Policies\AlumnoPolicy;
use Carbon\Carbon;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Alumno::class => AlumnoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        if (! $this->app->routesAreCached()) {
            //Passport::routes();
        }
        
        Passport::tokensExpireIn(now()->addDays(30));
        Passport::refreshTokensExpireIn(now()->addDays(30));
        Passport::personalAccessTokensExpireIn(now()->addMonths(6));

        $menus = Menu::all(); 
        $scopes = [];

        foreach ($menus as $menu) {
            $name = strtolower($menu->name);
            $scope = [$name=>''];
            $scopes = array_merge($scopes, $scope);
        }
        //dd($scopes);
        Passport::tokensCan($scopes);
    }
}
