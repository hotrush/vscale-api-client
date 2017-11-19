<?php

namespace Hotrush\Vscale\Tests;

use Hotrush\Vscale\Adapter\AbstractAdapter;
use Hotrush\Vscale\VscaleClient;
use PHPUnit\Framework\TestCase;

class VscaleClientTest extends TestCase
{
    public function testConstruct()
    {
        $adapterClass = 'Hotrush\Vscale\Adapter\\' . getenv('ADAPTER');
        /** @var AbstractAdapter $adapter */
        $adapter = new $adapterClass(getenv('APITOKEN'));
        $adapter->setEndpoint(getenv('ENDPOINT'));
        $client = new VscaleClient($adapter);
        $this->assertInstanceOf('Hotrush\Vscale\VscaleClient', $client);
    }
}