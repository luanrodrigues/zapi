<?php

namespace LuanRodrigues\Zapi\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use LuanRodrigues\Zapi\Zapi;

class BaseService
{

    protected $instanceId;
    protected $instanceToken;
    protected $clientToken;
    protected Client $client;
    public function __construct(Zapi $zapi)
    {
        $this->client = $zapi->getClient();
        $this->instanceId = $zapi->getConfig('instance_id');
        $this->instanceToken = $zapi->getConfig('instance_token');
        $this->clientToken = $zapi->getConfig('client_token');
    }

    public function useInstance(string $instanceId, string $instanceToken): self
    {
        $this->instanceId = $instanceId;
        $this->instanceToken = $instanceToken;
        return $this;
    }

    protected function request($method, $path, $body = null)
    {
        $headers['Client-Token'] = $this->clientToken;
        $url = "instances/".$this->instanceId."/token/".$this->instanceToken."/".$path;

        try {
            $response = $this->client->request($method,$url, [
                'headers' => $headers,
                'json' => $body
            ]);
            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return [
                'error' => true,
                'message' => $e->getMessage(),
                'response' => $e->hasResponse() ? $e->getResponse()->getBody()->getContents() : null
            ];
        }
    }

}
