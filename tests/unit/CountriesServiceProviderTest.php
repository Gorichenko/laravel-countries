<?php

use Illuminate\Support\ServiceProvider;
use NixEnterprise\Countries\ServiceProvider as CountriesServiceProvider;

class CountriesServiceProviderTest extends \Codeception\Test\Unit
{
    /**
     * @throws ReflectionException
     */
    public function testShouldSubClassServiceProviderClass()
    {
        $rc = new \ReflectionClass(CountriesServiceProvider::class);

        $this->assertTrue($rc->isSubclassOf(ServiceProvider::class));
    }
}
