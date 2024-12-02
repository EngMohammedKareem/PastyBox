<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Pasty;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('edit.pasty', function ($user, Pasty $pasty) {
            return $user->id === $pasty->user_id;
        });

        Gate::define('delete.pasty', function ($user, Pasty $pasty) {
            return $user->id === $pasty->user_id;
        });

        Gate::define("create.pasty", function ($user) {
            return $user !== null;
        });
    }
}
