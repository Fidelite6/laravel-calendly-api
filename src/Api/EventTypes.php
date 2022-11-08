<?php

namespace Fidelite\Calendly\Api;

/**
 * Class EventTypes
 * @package Fidelite\Calendly\Api
 */
class EventTypes extends Resource
{
    protected string $endPoint = '/event_types/';

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
