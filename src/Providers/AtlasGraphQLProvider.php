<?php

namespace Gtechmx\Atlas\Providers;
use Gtechmx\Atlas\Client\AtlasClientQuery;
use Gtechmx\Atlas\Client\AtlasClientMutation;
use Illuminate\Support\ServiceProvider;


class AtlasGraphQLProvider extends ServiceProvider
{
 
    public function boot()
    {
         if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../Config/atlas.php' => config_path('atlas.php'),
            ], 'config');
        }
    }

    public function register(){
        $this->mergeConfigFrom(__DIR__.'/../Config/atlas.php', 'atlas');

        $this->app->singleton('Gtechmx\Atlas\Client\AtlasClientQuery', function ($app) {
            return new AtlasClientQuery;
        });

        $this->app->singleton('Gtechmx\Atlas\Client\AtlasClientMutation', function ($app) {
            return new AtlasClientMutation;
        });
    }
}
