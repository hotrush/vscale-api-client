<?php

namespace Hotrush\Vscale\Api;

class Tag extends AbstractApi
{
    /**
     * Create new tag and optional attach to servers
     * https://developers.vscale.io/documentation/api/v1/#api-ServerTags-CreateNewTag
     *
     * @param $name
     * @param array $ids
     * @return mixed
     */
    public function create($name, array $ids = [])
    {
        $options = [
            'name' => $name,
        ];

        if ($ids) {
            $options['scalets'] = $ids;
        }

        return $this->adapter->post('scalets/tags', $options);
    }

    /**
     * Get tags list
     * https://developers.vscale.io/documentation/api/v1/#api-ServerTags-ListTags
     *
     * @return mixed
     */
    public function getList()
    {
        return $this->adapter->get('scalets/tags');
    }

    /**
     * Get tag info
     * https://developers.vscale.io/documentation/api/v1/#api-ServerTags-GetTagInfo
     *
     * @param $id
     * @return mixed
     */
    public function getTag($id)
    {
        return $this->adapter->get('scalets/tags/'.$id);
    }

    /**
     * Update tag
     * https://developers.vscale.io/documentation/api/v1/#api-ServerTags-UpdateTag
     *
     * @param $id
     * @param null $name
     * @param array $ids
     * @return mixed
     */
    public function update($id, $name = null, array $ids = [])
    {
        $options = [];

        if ($name) {
            $options['name'] = $name;
        }

        if ($ids) {
            $options['scalets'] = $ids;
        }

        if (empty($options)) {
            throw new \InvalidArgumentException('[Vscale] No name and scalets ids provided for tag update');
        }

        return $this->adapter->put('scalets/tags/'.$id, $options);
    }

    /**
     * Delete tag
     * https://developers.vscale.io/documentation/api/v1/#api-ServerTags-DeleteTag
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->adapter->delete('scalets/tags/'.$id);
    }
}