<?php

namespace Fidelite\Calendly;

use Fidelite\Calendly\Api\Client;
use Fidelite\Calendly\Api\EventTypes;
use Fidelite\Calendly\Api\Memberships;
use Fidelite\Calendly\Api\ScheduledEvents;
use Fidelite\Calendly\Api\Users;
use Fidelite\Calendly\Api\Webhooks;

/**
 * Class CalendlyAPI
 *
 * @package Fidelite\Calendly
 */
class CalendlyAPI
{
    protected array $config;
    protected Client $client;

    /**
     * CalendlyAPI constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config = $config;
        $this->client = new Client($config);
    }

    /**
     * @return Client
     */
    public function client(): Client
    {
        return $this->client;
    }

    /**
     * @param $personalToken
     * @param $organizationUri
     * @return CalendlyAPI
     */
    public function changeCredentials($personalToken, $organizationUri)
    {
        $config = [
            'personal_token' => $personalToken,
            'organization_uri' => $organizationUri,
        ];

        $this->config = $config;
        $this->client = new Client($config);

        return $this;
    }

    /**
     * @return Users
     */
    public function users(): Users
    {
        return new Users($this->client);
    }

    /**
     * @return EventTypes
     */
    public function eventTypes(): EventTypes
    {
        return new EventTypes($this->client);
    }

    /**
     * @return ScheduledEvents
     */
    public function scheduledEvents(): ScheduledEvents
    {
        return new ScheduledEvents($this->client);
    }

    /**
     * @return Memberships
     */
    public function memberships(): Memberships
    {
        return new Memberships($this->client);
    }

    /**
     * @return Webhooks
     */
    public function webhooks($organizationUri = null): Webhooks
    {
        if (is_null($organizationUri)) {
            $organizationUri = $this->config['organization_uri'];
        }

        return new Webhooks($this->client, $organizationUri);
    }
}
