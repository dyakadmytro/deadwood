<?php

namespace App\Providers;

use App\Contracts\TVDataProvider;
use App\Services\TVmaze;
use GuzzleHttp\Client;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TVDataProvider::class, function (Application $app) {
            $configData = config('tv_providers.tvmaze');
            $client = new Client([
                'base_url' => $configData['url'],
                'timeout'  => 5.0,
            ]);

            return new TVmaze($client);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
