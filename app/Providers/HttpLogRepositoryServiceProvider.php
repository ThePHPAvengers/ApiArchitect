<?php

namespace ApiArchitect\Providers;

use ApiArchitect\Entities\Log\HttpLog;
use Illuminate\Support\ServiceProvider;
use ApiArchitect\Repositories\Log\HttpLogRepository;

/**
 * Class HttpLogRepositoryServiceProvider
 *
 * @package ApiArchitect\Providers
 * @author James Kirkby <hello@jameskirkby.com>
 */
class HttpLogRepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(HttpLogRepository::class, function($app) {
            // This is what Doctrine's EntityRepository needs in its constructor.
            return new HttpLogRepository(
                $app['em'],
                $app['em']->getClassMetaData(HttpLog::class)
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
        return ['ApiArchitect\Repositories\Log\HttpLogRepository'];
    }
}