<?php

namespace Hotrush\Vscale\Adapter;

use GuzzleHttp\Exception\RequestException;
use Hotrush\Vscale\Exception\InvalidPlanException;
use Hotrush\Vscale\Exception\InvalidImageException;
use Hotrush\Vscale\Exception\InvalidServerLocationException;
use Hotrush\Vscale\Exception\ServerNotFoundException;

abstract class AbstractAdapter implements AdapterInterface
{
    protected function handleError(RequestException $exception)
    {
        switch ($exception->getResponse()->getHeader('Vscale-Error-Message')) {
            case 'no_location_found':
                throw new InvalidServerLocationException();
                break;
            case 'no_rplan_found':
                throw new InvalidPlanException();
                break;
            case 'no_object_to_create_from':
                throw new InvalidImageException();
                break;
            case 'no_scalet_id_passed':
                throw new ServerNotFoundException();
                break;
            default:
                throw new \InvalidArgumentException('[Vscale] Unknown error received: '.$exception->getMessage());
        }
    }
}