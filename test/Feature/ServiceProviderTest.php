<?php

declare(strict_types=1);

namespace ApiSkeletonsTest\Laravel\Doctrine\DataFixtures;

use ApiSkeletons\Laravel\Doctrine\DataFixtures\ServiceProvider;

class ServiceProviderTest extends TestCase
{
    public function testServiceProvider(): void
    {
        $serviceProvider = new ServiceProvider($this->app);

        $serviceProvider->boot();
        $serviceProvider->register();

        $this->assertTrue(true);
    }
}
