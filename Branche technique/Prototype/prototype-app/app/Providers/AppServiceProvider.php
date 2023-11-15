<?php

namespace App\Providers;

use App\Repositories\TaskRepository;
use Illuminate\Pagination\Paginator;
use App\Repositories\MemberRepository;
use App\Repositories\ProjectRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\ManageTaskRepository;
use App\Repositories\ManageMemberRepository;
use App\Repositories\ManageProjectRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ManageProjectRepository::class, ProjectRepository::class);
        $this->app->bind(ManageTaskRepository::class, TaskRepository::class);
        $this->app->bind(ManageMemberRepository::class, MemberRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}
