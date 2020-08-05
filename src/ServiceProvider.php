<?php

namespace NixEnterprise\Countries;

use NixEnterprise\Countries\Model\Repository;
use PragmaRX\Countries\Package\Services\Config;
use PragmaRX\Countries\Package\Services\Helper;
use PragmaRX\Countries\Package\Services\Hydrator;
use PragmaRX\Countries\Package\Countries as CountriesService;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerService();
    }

    /**
     * Register the service.
     */
    protected function registerService()
    {
        $this->app->singleton('XCountries', function () {
            $hydrator = new Hydrator($config = new Config(config()));

            $cache = new Cache($config, app(config('countries.cache.service')));

            $helper = new Helper($config);

            $repository = new Repository($cache, $hydrator, $helper, $config);

            $hydrator->setRepository($repository);

            return new CountriesService($config, $cache, $helper, $hydrator, $repository);
        });
    }
}
