<?php

namespace App\Http\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class ApiService
{
    /**
     * API Client
     */
    protected $client;

    /**
     * Guzzle API Client instance
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('api.host')
        ]);
    }

    public function get(string $uri, array $params = [])
    {
        if ( !empty($params) ) $uri .= "?".http_build_query($params);

        try {
            $response = $this->client->get($uri);

            return json_decode($response->getBody());
        } catch (ClientException $e) {
            return json_decode($e->getResponse()->getBody());
        }
    }

    public function post(string $uri, array $params = [])
    {
        try {
            $response = $this->client->post($uri, ['json' => $params]);

            return json_decode($response->getBody());
        } catch (ClientException $e) {
            return json_decode($e->getResponse()->getBody());
        }
    }
}