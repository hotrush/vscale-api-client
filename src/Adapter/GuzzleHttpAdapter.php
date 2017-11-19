<?php

namespace Hotrush\Vscale\Adapter;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Hotrush\Vscale\VscaleClient;

class GuzzleHttpAdapter extends AbstractAdapter
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * Api token
     * https://vscale.io/panel/settings/tokens/
     *
     * @var string
     */
    protected $apiToken;

    protected $response;

    public function __construct($apiToken)
    {
        $this->apiToken = $apiToken;

        $this->buildClient();
    }

    protected function buildClient($endpoint = null)
    {
        if ($endpoint === null) {
            $endpoint = VscaleClient::ENDPOINT;
        }
        $config = [
            'base_uri' => $endpoint,
            'headers' => [
                'Accept' => 'application/json',
                'User-Agent' => sprintf('%s v%s (%s)',
                    VscaleClient::AGENT,
                    VscaleClient::VERSION,
                    VscaleClient::WEBSITE
                ),
                'X-Token' => $this->apiToken,
            ],
        ];

        $this->client = new Client($config);
    }

    public function setEndpoint($endpoint)
    {
        $this->buildClient($endpoint);
    }

    public function get($url, array $args = [])
    {
        $options = [];
        if (!empty($args)) {
            $options['query'] = $args;
        }

        try {
            $response = $this->client->get($url, $options);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return $this->handleError($e);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function post($url, array $args)
    {
        $options = [
            'json' => $args,
        ];

        try {
            $response = $this->client->post($url, $options);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return $this->handleError($e);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function put($url, array $args)
    {
        $options = [
            'json' => $args,
        ];

        try {
            $response = $this->client->put($url, $options);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return $this->handleError($e);
        }
    }

    public function delete($url, array $args = [])
    {
        $options = [
            'json' => $args
        ];

        try {
            $response = $this->client->delete($url, $options);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return $this->handleError($e);
        }
    }

    public function patch($url, array $args = [])
    {
        $options = [
            'json' => $args
        ];

        try {
            $response = $this->client->patch($url, $options);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return $this->handleError($e);
        }
    }
}