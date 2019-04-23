<?php

namespace App\Providers;

use App\Desarrollador;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        Gate::define('admin', function ($desarrollador) {
            return
                $desarrollador->hasRole('admin');
        });
        Gate::define('user', function ($desarrollador) {
            return
                $desarrollador->hasRole('user');
        });
        Gate::define('lider', function ($desarrollador) {
            return
                $desarrollador->can('admin') || $desarrollador->proyectosLiderados()->find(1);
        });
    }
}
