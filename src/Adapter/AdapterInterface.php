<?php

namespace Hotrush\Vscale\Adapter;

interface AdapterInterface
{
    public function get($url, array $args = []);

    public function post($url, array $args);

    public function delete($url, array $args = []);

    public function patch($url, array $args = []);

    public function setEndpoint($endpoint);
}