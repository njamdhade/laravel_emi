<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\LoanDetailRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
//        $this->app->bind(BaseRepository::class, LoanDetailRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
