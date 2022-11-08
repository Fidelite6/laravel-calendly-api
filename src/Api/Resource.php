<?php

namespace Fidelite\Calendly\Api;

use Exception;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class Resource
 * @package Fidelite\Calendly\Api
 */
abstract class Resource
{
    protected string $endPoint;
    protected Client $client;

    /**
     * Resource constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param $uuid
     * @return mixed
     * @throws Exception
     * @throws GuzzleException
     */
    public function get($uuid): mixed
    {
        $uuid = $this->client->uriToUuid($uuid);

        return $this->client->request('get', $this->endPoint . $uuid)->resource;
    }
}
