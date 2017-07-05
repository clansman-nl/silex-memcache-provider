<?php

namespace Basebuilder\MemcacheProvider;

use Pimple;
use Silex\Application;
use Silex\ServiceProviderInterface;

class MemcacheProvider implements ServiceProviderInterface
{
    /**
     * @inheritdoc
     */
    public function register(Application $app)
    {
        $app['memcache'] = $app->share(function (Pimple $app) {
            $defaults = [
                'host' => '127.0.0.1',
                'port' => 11211
            ];

            $opts = array_merge($defaults, (array) $app['memcache.options']);

            $memcache = new \Memcache();
            $memcache->connect($opts['host'], $opts['port']);

            return $memcache;
        });
    }

    /**
     * @inheritdoc
     */
    public function boot(Application $app)
    {
        // TODO: Implement boot() method.
    }
}
