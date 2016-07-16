<?php

namespace ApiArchitect\Providers;

use ApiArchitect\Entities\Dog;
use Illuminate\Support\ServiceProvider;
use ApiArchitect\Repositories\DogRepository;

/**
 * Class DogRepositoryServiceProvider
 *
 * @package ApiArchitect\Providers
 * @author James Kirkby <hello@jameskirkby.com>
 */
class DogRepositoryServiceProvider extends ServiceProvider
{

    /**
     * @var bool
     */
    protected $defer = true;

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
        $this->app->bind(DogRepository::class, function($app) {
            // This is what Doctrine's EntityRepository needs in its constructor.
            return new DogRepository(
                $app['em'],
                $app['em']->getClassMetaData(Dog::class)
            );
        });
    }

    /**
     * Get the services provided by the provider since we are deferring load.
     *
     * @return array
     */
    public function provides()
    {
        return ['ApiArchitect\Repositories\DogRepository'];
    }
}