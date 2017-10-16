<?php

namespace Hotrush\Vscale\Api;

class SshKey extends AbstractApi
{
    /**
     * Get list of all ssh keys
     * https://developers.vscale.io/documentation/api/v1/#api-SSHkeys-GetSSHkeys
     *
     * @return []
     */
    public function getList()
    {
        return $this->adapter->get('sshkeys');
    }

    /**
     * Create an SSH key
     * https://developers.vscale.io/documentation/api/v1/#api-SSHkeys-PostSSHkeys
     *
     * @param $name
     * @param $sshKey
     * @return mixed
     */
    public function create($name, $sshKey)
    {
        $args = [
            'name' => $name,
            'key'  => $sshKey,
        ];
        $key = $this->adapter->post('sshkeys', $args);

        return $key['id'];
    }

    /**
     * Delete an SSH key by id
     * https://developers.vscale.io/documentation/api/v1/#api-SSHkeys-DeleteSSHkeys
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->adapter->delete('sshkeys/'.$id);
    }
}