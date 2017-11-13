<?php

namespace Hotrush\Vscale\Api;

class Background extends AbstractApi
{
    /**
     * Get available locations
     * https://developers.vscale.io/documentation/api/v1/#api-Background-GetLocations
     *
     * @return mixed
     */
    public function getLocations()
    {
        return $this->adapter->get('locations');
    }

    /**
     * Get available images list
     * https://developers.vscale.io/documentation/api/v1/#api-Background-GetImages
     *
     * @return mixed
     */
    public function getImages()
    {
        return $this->adapter->get('images');
    }
}