<?php


namespace Fidelite\Calendly\Api;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Client as GuzzleHttpClient;

/**
 * Class Client
 * @package Fidelite\Calendly\Api
 */
class Client
{
    const BASE_URI = 'https://api.calendly.com';
    protected GuzzleHttpClient $client;

    /**
     * Client constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->client = new GuzzleHttpClient(
            [
                'base_uri' => self::BASE_URI,
                'headers' => [
                    'Authorization' => "Bearer " . $config['personal_token'],
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
            ]
        );
    }

    /**
     * @param string $method
     * @param string $path
     * @param array|null $params
     * @return mixed
     * @throws Exception
     * @throws GuzzleException
     */
    public function request(string $method, string $path, array $params = null): mixed
    {
        $uri = $this->getBaseUri()->withPath($path);

        // Build the request parameters for Guzzle
        $options = [];
        if ($params !== null) {
            $options[strtoupper($method) === 'GET' ? 'query' : 'json'] = $params;
        }

        /** @var ResponseInterface $response */
        $response = $this->client->request($method, $uri, $options);

        return $this->response($response);
    }

    /**
     * @return Uri
     */
    public function getBaseUri(): Uri
    {
        return new Uri($this->client->getConfig('base_uri'));
    }

    /**
     * @param ResponseInterface $response
     * @return mixed
     */
    public function response(ResponseInterface $response): mixed
    {
        return json_decode($response->getBody());
    }

    public function uriToUuid($uri)
    {
        if (str_contains($uri, self::BASE_URI)) {
            $arr = explode('/', $uri);
            $uri = end($arr);
        }

        return $uri;
    }
}
