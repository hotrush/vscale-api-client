<?php

namespace Hotrush\Vscale;

use Hotrush\Vscale\Adapter\AdapterInterface;
use Hotrush\Vscale\Api\Server;
use Hotrush\Vscale\Api\SshKey;

class VscaleClient
{
    const ENDPOINT = 'https://api.vscale.io/v1/';
    const AGENT = 'Vscale PHP Client';
    const VERSION = '0.1';
    const WEBSITE = 'https://github.com/hotrush/vscale-api-client';

    /**
     * @var AdapterInterface
     */
    private $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * Operate with SSH keys
     * https://developers.vscale.io/documentation/api/v1/#api-SSHkeys
     *
     * @return SshKey
     */
    public function sshKey()
    {
        return new SshKey($this->adapter);
    }

    /**
     * Servers manipulations
     * https://developers.vscale.io/documentation/api/v1/#api-Servers
     *
     * @return Server
     */
    public function server()
    {
        return new Server($this->adapter);
    }
}