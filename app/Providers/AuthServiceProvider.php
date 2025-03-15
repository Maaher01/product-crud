<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Poduct;
use App\Policies\ProductPolicy;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Product::class => ProductPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('products_create', function (User $user) {
        //     return in_array($user->role, ['user', 'admin', 'super_admin']);
        // });

        // Gate::define('products_edit', function (User $user) {
        //     return in_array($user->role, ['admin', 'super_admin']);
        // });

        // Gate::define('products_delete', function (User $user) {
        //     return in_array($user->role, ['super_admin']);
        // });
    }
}
