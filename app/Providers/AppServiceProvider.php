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
                  'api_key'         => 'vaqcyr27eJ',
                  'nodes'           => [
                    [
                      'host'     => 'localhost',
                      'port'     => '8108',
                      'protocol' => 'http',
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
