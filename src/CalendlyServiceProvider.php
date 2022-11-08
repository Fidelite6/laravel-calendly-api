<?php

namespace Fidelite\Calendly;

use Illuminate\Support\ServiceProvider;

/**
 * Class CalendlyServiceProvider
 * @package Fidelite\Calendly
 */
class CalendlyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/calendly.php' => config_path('calendly.php'),
        ], 'config');

        $this->app->bind('calendly', function ($app) {
            return new CalendlyAPI($app['config']['calendly']);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/calendly.php', 'calendly');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return ['calendly'];
    }
}
