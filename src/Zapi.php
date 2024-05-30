<?php

namespace LuanRodrigues\Zapi;

use GuzzleHttp\Client;

class Zapi
{
    protected Client $client;
    protected array $config;

    public function __construct(array $config = [])
    {
        $this->client = new Client($config['client'] ?? []);
        $this->config = $config;
    }

    public function getClient(): Client
    {
        return $this->client;
    }
    public function getConfig($key = ''): array|string
    {
        if ($key) {
            return $this->config[$key] ?? [];
        }
        return $this->config;
    }
    public function __call(string $name, array $arguments)
    {
        if (!($api = $this->config['api'] ?? null) || !array_key_exists($name, $api)) {
            throw new \Exception("O endpoint '$name' não foi implementado ou não existe");
        }

        return new $api[$name]($this);
    }
}
