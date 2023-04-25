<?php

namespace App\Providers;

use App\Models\LoyalCustomer;
use App\Policies\BachTestPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        LoyalCustomer::class => BachTestPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('gate-admin', function ($user,LoyalCustomer $loyalCustomer) {
            return $loyalCustomer->role == "admin";
        });
        Gate::define('gate-user', function ($user,LoyalCustomer $loyalCustomer) {
            return $loyalCustomer->role == "user";
        });
    }
}
