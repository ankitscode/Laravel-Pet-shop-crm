<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
 
use App\Services\Auth\doctors;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Foundation\Application;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    // public function boot(): void

    // {
    //     $this->registerPolicies();

    //     //
    // }
    public function boot(): void
    {
        // Auth::extend('doctors', function (Application $app, string $name, array $config) {
        //     // Return an instance of Illuminate\Contracts\Auth\Guard...
 
        //     return new doctors(Auth::createUserProvider($config['provider']));
        // });
    }
}
