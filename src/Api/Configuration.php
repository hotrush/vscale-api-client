<?php

namespace Hotrush\Vscale\Api;

class Configuration extends AbstractApi
{
    /**
     * Get plans available
     * https://developers.vscale.io/documentation/api/v1/#api-Configurations-GetRplans
     *
     * @return mixed
     */
    public function getPlans()
    {
        return $this->adapter->get('rplans');
    }

    /**
     * Get plan's prices
     * https://developers.vscale.io/documentation/api/v1/#api-Configurations-GetPrices
     *
     * @return mixed
     */
    public function getPrices()
    {
        return $this->adapter->get('billing/prices');
    }
}