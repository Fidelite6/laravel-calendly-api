<?php

namespace Fidelite\Calendly\Api;

use GuzzleHttp\Exception\GuzzleException;

/**
 * Class Users
 * @package Fidelite\Calendly\Api
 */
class Users extends Resource
{
    /**
     * @var string
     */
    protected string $endPoint = '/users/';

    /**
     * @return mixed
     * @throws GuzzleException
     */
    public function me(): mixed
    {
        return $this->get('me');
    }

}
