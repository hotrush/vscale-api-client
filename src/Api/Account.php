<?php

namespace Hotrush\Vscale\Api;

class Account extends AbstractApi
{
    /**
     * Get account info
     * https://developers.vscale.io/documentation/api/v1/#api-Account-GetAccount
     *
     * @return mixed
     */
    public function getAccount()
    {
        return $this->adapter->get('account');
    }
}