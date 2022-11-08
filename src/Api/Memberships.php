<?php

namespace Fidelite\Calendly\Api;

/**
 * Class Memberships
 * @package Fidelite\Calendly\Api
 */
class Memberships extends Resource
{
    protected string $endPoint = '/organization_memberships/';

    public function forOrganization($uri, $count = 100)
    {
        return $this->client->request('get', $this->endPoint, [
            'organization' => $uri,
            'count' => $count,
        ]);
    }

    public function forUser($uri, $count = 100)
    {
        return $this->client->request('get', $this->endPoint, [
            'user' => $uri,
            'count' => $count,
        ]);
    }
}
