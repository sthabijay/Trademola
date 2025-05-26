<?php

namespace App\Providers;

use App\Models\Entry;
use App\Models\Log;
use App\Observers\EntryObserver;
use App\Observers\LogObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        \App\Models\Portfolio::class => \App\Policies\PortfolioPolicy::class,
    ];
    
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
        Entry::observe(EntryObserver::class);
        Log::observe(LogObserver::class);
    }
}
