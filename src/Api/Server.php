<?php

namespace Hotrush\Vscale\Api;

class Server extends AbstractApi
{
    /**
     * Get server's list
     * https://developers.vscale.io/documentation/api/v1/#api-Servers-GetScalet
     *
     * @return mixed
     */
    public function getList()
    {
        return $this->adapter->get('scalets');
    }

    /**
     * Create server
     * https://developers.vscale.io/documentation/api/v1/#api-Servers-PostScalet
     *
     * @param array $config
     * @return mixed
     */
    public function create(array $config)
    {
        return $this->adapter->post('scalets', $config);
    }

    /**
     * Get server details
     * https://developers.vscale.io/documentation/api/v1/#api-Servers-GetScaletCtid
     *
     * @param $id
     * @return mixed
     */
    public function getServer($id)
    {
        return $this->adapter->get('scalets/'.$id);
    }

    /**
     * Destroy server
     * https://developers.vscale.io/documentation/api/v1/#api-Servers-DeleteScalets
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->adapter->delete('scalets/'.$id);
    }

    /**
     * Restart server
     * https://developers.vscale.io/documentation/api/v1/#api-Servers-PatchRestart
     *
     * @param $id
     * @return mixed
     */
    public function restart($id)
    {
        return $this->adapter->patch('scalets/'.$id.'/restart');
    }

    /**
     * Power-off server
     * https://developers.vscale.io/documentation/api/v1/#api-Servers-PatchStop
     *
     * @param $id
     * @return mixed
     */
    public function stop($id)
    {
        return $this->adapter->patch('scalets/'.$id.'/stop');
    }

    /**
     * Start server
     * https://developers.vscale.io/documentation/api/v1/#api-Servers-PatchStart
     *
     * @param $id
     * @return mixed
     */
    public function start($id)
    {
        return $this->adapter->patch('scalets/'.$id.'/start');
    }

    /**
     * Upgrade server configuration
     * https://developers.vscale.io/documentation/api/v1/#api-Servers-PostUpgrade
     *
     * @param $id
     * @param $plan
     * @return mixed
     */
    public function upgrade($id, $plan)
    {
        return $this->adapter->post('scalets/'.$id.'/upgrade', [
            'rplan' => $plan,
        ]);
    }

    /**
     * Get current operations log
     * https://developers.vscale.io/documentation/api/v1/#api-Servers-GetTasks
     *
     * @return mixed
     */
    public function tasks()
    {
        return $this->adapter->get('tasks');
    }

    /**
     * Add ssh key(s) to server
     * https://developers.vscale.io/documentation/api/v1/#api-Servers-PatchSSHkeys
     *
     * @param $id
     * @param $sshKeys
     * @return mixed
     */
    public function addSshKey($id, $sshKeys)
    {
        if (!is_array($sshKeys)) {
            $sshKeys = [$sshKeys];
        }

        return $this->adapter->patch('scalets/'.$id, [
            'keys' => $sshKeys,
        ]);
    }

    /**
     * Create server's backup
     * https://developers.vscale.io/documentation/api/v1/#api-Servers-CreatingBackupCopy
     *
     * @param $id
     * @param $name
     * @return mixed
     */
    public function backup($id, $name)
    {
        $options = [];

        if ($name) {
            $options['name'] = $name;
        }

        return $this->adapter->post('scalets/'.$id.'/backup', $options);
    }

    /**
     * Rebuild server from backup
     * https://developers.vscale.io/documentation/api/v1/#api-Servers-RestoreServerBackup
     *
     * @param $serverId
     * @param $backupId
     * @return mixed
     */
    public function rebuild($serverId, $backupId)
    {
        return $this->adapter->patch('scalets/'.$serverId.'/rebuild', [
            'make_from' => $backupId,
        ]);
    }
}