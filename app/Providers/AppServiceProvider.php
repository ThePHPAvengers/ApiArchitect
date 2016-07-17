<?php

namespace ApiArchitect\Providers;

use Doctrine\Common\Cache\MemcachedCache;
use Illuminate\Cache\CacheManager;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 *
 * @package ApiArchitect\Providers
 * @author James Kirkby <hello@jameskirkby.com>
 */
class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @param CacheManager $cache
     */
    public function boot(CacheManager $cache)
    {
        $cache->extend('memcache', function(Application $app) {
        $memcached = new \Memcache;
        return new MemcachedCache($memcached);
    });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
