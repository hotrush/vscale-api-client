<?php

namespace Hotrush\Vscale\Api;

use Hotrush\Vscale\Adapter\AdapterInterface;

abstract class AbstractApi
{
    /**
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * @param AdapterInterface $adapter
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }
}