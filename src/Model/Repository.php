<?php

namespace NixEnterprise\Countries\Model;

use PragmaRX\Countries\Package\Services\Helper;
use PragmaRX\Countries\Package\Services\Hydrator;
use Psr\SimpleCache\CacheInterface as CacheContract;
use PragmaRX\Countries\Package\Data\Repository as PragmaRepository;

class Repository extends PragmaRepository
{
    /**
     * Repository constructor.
     * @param CacheContract $cache
     * @param Hydrator $hydrator
     * @param Helper $helper
     * @param $config
     */
    public function __construct(CacheContract $cache, Hydrator $hydrator, Helper $helper, $config)
    {
        parent::__construct($cache, $hydrator, $helper, $config);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function loadCountriesJson()
    {
        $data = $this->helper->loadJson(
            $fileName = $this->helper->dataDir(__DIR__ . '../data/countries/default/_all_countries.json')
        );

        if ($data->isEmpty()) {
            throw new \Exception("Could not load countries from {$fileName}");
        }

        return $data;
    }
}
