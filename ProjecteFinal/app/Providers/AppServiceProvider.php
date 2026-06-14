<?php
 
namespace App\Providers;
 
use Illuminate\Support\ServiceProvider;
use App\Models\Rutina;
use App\Models\Entreno;
use App\Policies\RutinaPolicy;
use App\Policies\EntrenoPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;
 
class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }
 
    public function boot(): void
    {
        // Paginació amb estil Bootstrap 5
        Paginator::useBootstrapFive();
 
        Gate::policy(Rutina::class, RutinaPolicy::class);
        Gate::policy(Entreno::class, EntrenoPolicy::class);
    }
}
 