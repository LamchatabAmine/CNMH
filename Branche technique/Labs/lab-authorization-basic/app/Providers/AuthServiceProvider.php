<?php

namespace App\Providers;

use App\Models\Task;
use App\Policies\TaskPolicy;
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
        // Task::class => TaskPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('create-Task', function ($user) {
            return $user->role == 'project-leader';
        });
        Gate::define('store-Task', function ($user) {
            return $user->role == 'project-leader';
        });
        Gate::define('edit-Task', function ($user) {
            return $user->role == 'project-leader';
        });
        Gate::define('update-Task', function ($user) {
            return $user->role == 'project-leader';
        });
        Gate::define('destroy-Task', function ($user) {
            return $user->role == 'project-leader';
        });
        Gate::define('index-Task', function ($user) {
            return $user ;
        });
    }
}
