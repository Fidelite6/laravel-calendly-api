<?php

namespace Fidelite\Calendly\Api;

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

    public function me()
    {
        return $this->get('me');
    }
}
