<?php

namespace Hotrush\Vscale\Api;

class Backup extends AbstractApi
{
    /**
     * Get backups list
     * https://developers.vscale.io/documentation/api/v1/#api-Backups-ViewBackupsList
     *
     * @return mixed
     */
    public function getList()
    {
        return $this->adapter->get('backups');
    }

    /**
     * Get backup info
     * https://developers.vscale.io/documentation/api/v1/#api-Backups-BackupInfo
     *
     * @param $id
     * @return mixed
     */
    public function getBackup($id)
    {
        return $this->adapter->get('backups/'.$id);
    }

    /**
     * Remove backup by id
     * https://developers.vscale.io/documentation/api/v1/#api-Backups-BackupDelete
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->adapter->delete('backups/'.$id);
    }

    /**
     * Relocate backup to another location
     * https://developers.vscale.io/documentation/api/v1/#api-Backups-BackupsRelocate
     *
     * @param $id
     * @param $destination
     * @return mixed
     */
    public function relocate($id, $destination)
    {
        return $this->adapter->post('backups/'.$id.'/relocate', [
            'destination' => $destination,
        ]);
    }
}