<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Podcast;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
    public function boot(): void
    {
        Gate::define('podcast', function (User $user, Podcast $podcast) {
            return $user->id === $podcast->user_id || $user->isAdmin();
        });
    }
}
