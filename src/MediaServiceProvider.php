<?php

namespace Woodoocoder\LaravelMedia;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class MediaServiceProvider extends ServiceProvider {

    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        Route::prefix('api/media')
            ->middleware('api')
            ->namespace('Woodoocoder\LaravelMedia')
            ->group(__DIR__ . '/routes/api.php');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        $this->mergeConfigFrom(__DIR__ .'/config/config.php', 'woodoocoder.media');
        $this->publishes([__DIR__ .'/config/config.php' => config_path('woodoocoder/media.php')], 'media-config');
        
        $this->loadMigrationsFrom(__DIR__.'/database/migrations/');
    }
}
