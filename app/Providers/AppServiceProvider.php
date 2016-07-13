<?php

namespace ApiArchitect\Providers;

use Illuminate\Support\ServiceProvider;
use ApiArchitect\Adapters\User\DoctrineUserAdapter;

/**
 * Class AppServiceProvider
 * @package ApiArchitect\Providers
 */
class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DoctrineUserAdapter::class, function($app) {
            // This is what Doctrine's EntityRepository needs in its constructor.
            return new DoctrineUserAdapter(
                $app['em']
            );
        });
    }
}
