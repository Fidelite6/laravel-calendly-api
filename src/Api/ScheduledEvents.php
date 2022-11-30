<?php

namespace Fidelite\Calendly\Api;

/**
 * Class ScheduledEvents
 * @package Fidelite\Calendly\Api
 */
class ScheduledEvents extends Resource
{
    const DEFAULT_SORT = 'start_time:desc';

    /**
     * @var string
     */
    protected string $endPoint = '/scheduled_events/';

    public function forOrganization($uri, $count = 100, $sort = self::DEFAULT_SORT)
    {
        return $this->client->request('get', $this->endPoint, [
            'organization' => $uri,
            'count'        => $count,
            'sort'    => $sort,
        ]);
    }

    public function forUser($uri, $count = 100, $sort = self::DEFAULT_SORT)
    {
        return $this->client->request('get', $this->endPoint, [
            'user'      => $uri,
            'count'     => $count,
            'sort' => $sort,
        ]);
    }

    public function getEvent($uuid)
    {
        return $this->client->request('get', $this->endPoint.$uuid);
    }

    public function invitees($uuid)
    {
        $uuid = $this->client->uriToUuid($uuid);

        return $this->client->request('get', $this->endPoint.$uuid.'/invitees');
    }

    public function invitee($eventUuid, $inviteeUuid)
    {
        $eventUuid = $this->client->uriToUuid($eventUuid);
        $inviteeUuid = $this->client->uriToUuid($inviteeUuid);

        return $this->client
            ->request('get', $this->endPoint.$eventUuid.'/invitees/'.$inviteeUuid)
            ->resource;
    }
}
