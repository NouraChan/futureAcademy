<?php
namespace App\Providers;
use App\Repository\interface\IdepartmentRepository;
use App\Repository\departmentRepository;
use App\Repository\interface\IUserRepository;
use App\Repository\UserRepository;
use App\Repository\interface\ICourseRepository;
use App\Repository\courseRepository;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
        $this->app->singleton(IUserRepository::class,UserRepository::class);
        $this->app->singleton(IdepartmentRepository::class,departmentRepository::class);
        $this->app->singleton(ICourseRepository::class,courseRepository::class)
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
