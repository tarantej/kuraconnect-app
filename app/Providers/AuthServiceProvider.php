<?php

namespace App\Providers;

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
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Call Passport Routes

        Passport::routes();
        Passport::tokensCan([
        'admin' => 'Access Admin Backend',
        'volunteer' => 'Access Volunteer App',
    ]);
    Passport::setDefaultScope([
        'users',
    ]);
    }
}
