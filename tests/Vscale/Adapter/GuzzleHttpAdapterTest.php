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

    public function testPost()
    {
        $this->expectException('\InvalidArgumentException');
        $this->expectExceptionMessage('[Vscale] Unknown error received: Client error: `POST https://api.vscale.io/v1/scalets` resulted in a `403 Forbidden` response');

        $this->client->post('scalets', []);

        sleep(2);
    }

    public function testPut()
    {
        $this->expectException('\InvalidArgumentException');
        $this->expectExceptionMessage('[Vscale] Unknown error received: Client error: `PUT https://api.vscale.io/v1/scalets/tags/1` resulted in a `403 Forbidden` response');

        $this->client->put('scalets/tags/1', []);

        sleep(2);
    }

    public function testDelete()
    {
        $this->expectException('\InvalidArgumentException');
        $this->expectExceptionMessage('[Vscale] Unknown error received: Client error: `DELETE https://api.vscale.io/v1/scalets/1` resulted in a `403 Forbidden` response');

        $this->client->delete('scalets/1');

        sleep(2);
    }

    public function testPatch()
    {
        $this->expectException('\InvalidArgumentException');
        $this->expectExceptionMessage('[Vscale] Unknown error received: Client error: `PATCH https://api.vscale.io/v1/scalets/1/start` resulted in a `403 Forbidden` response');

        $this->client->patch('scalets/1/start', []);

        sleep(2);
    }
}