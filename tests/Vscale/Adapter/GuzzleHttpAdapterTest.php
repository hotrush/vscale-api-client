<?php

namespace Hotrush\Vscale\Tests\Adapter;

use Hotrush\Vscale\Adapter\GuzzleHttpAdapter;
use PHPUnit\Framework\TestCase;

class GuzzleHttpAdapterTest extends TestCase
{
    /**
     * @var GuzzleHttpAdapter
     */
    protected $client;

    protected function setUp()
    {
        $this->client = new GuzzleHttpAdapter('APITOKEN');
    }

    public function testConstruct()
    {
        $this->assertInstanceOf('Hotrush\Vscale\Adapter\GuzzleHttpAdapter', $this->client);
    }

    public function testGet()
    {
        $this->expectException('\InvalidArgumentException');
        $this->expectExceptionMessage('[Vscale] Unknown error received: Client error: `GET https://api.vscale.io/v1/account` resulted in a `403 Forbidden` response');
        $this->client->get('account');

        sleep(2);
    }
}