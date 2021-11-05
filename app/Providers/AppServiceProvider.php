<?php

namespace App\Providers;

use Typesense\Client;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Client::class, function() {
            return new Client(
                [
                  'api_key'         => config('typesense.key'),
                  'nodes'           => [
                    [
                      'host'     => config('typesense.host'),
                      'port'     => config('typesense.port'),
                      'protocol' => config('typesense.protocol'),
                    ],
                  ],
                  'connection_timeout_seconds' => 2,
                ]
              );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
