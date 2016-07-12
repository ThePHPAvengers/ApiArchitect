<?php

namespace ApiArchitect\Providers;

use ApiArchitect\Entities\Dog;
use ApiArchitect\Entities\User;
use Illuminate\Support\ServiceProvider;
use ApiArchitect\Repositories\Dog\DogRepository;
use ApiArchitect\Repositories\User\UserRepository;

/**
 * Class AppServiceProvider
 * @package ApiArchitect\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(UserRepository::class, function($app) {
            // This is what Doctrine's EntityRepository needs in its constructor.
            return new UserRepository(
                $app['em'],
                $app['em']->getClassMetaData(User::class)
            );
        });

        $this->app->bind(DogRepository::class, function($app) {
            // This is what Doctrine's EntityRepository needs in its constructor.
            return new DogRepository(
                $app['em'],
                $app['em']->getClassMetaData(Dog::class)
            );
        });
    }
}