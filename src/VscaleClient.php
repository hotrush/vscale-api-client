<?php

namespace Hotrush\Vscale;

use Hotrush\Vscale\Adapter\AdapterInterface;
use Hotrush\Vscale\Api\Account;
use Hotrush\Vscale\Api\Background;
use Hotrush\Vscale\Api\Backup;
use Hotrush\Vscale\Api\Configuration;
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

    /**
     * Account details
     * https://developers.vscale.io/documentation/api/v1/#api-Account
     *
     * @return Account
     */
    public function account()
    {
        return new Account($this->adapter);
    }

    /**
     * Backups info
     * https://developers.vscale.io/documentation/api/v1/#api-Backups
     *
     * @return Backup
     */
    public function backup()
    {
        return new Backup($this->adapter);
    }

    /**
     * Background data
     * https://developers.vscale.io/documentation/api/v1/#api-Background
     *
     * @return Background
     */
    public function background()
    {
        return new Background($this->adapter);
    }

    /**
     * Configurations and plans
     * https://developers.vscale.io/documentation/api/v1/#api-Configurations
     *
     * @return Configuration
     */
    public function configuration()
    {
        return new Configuration($this->adapter);
    }
}