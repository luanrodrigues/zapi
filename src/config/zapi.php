<?php

return [
    'instance_token' => env('ZAPI_INSTANCE_TOKEN', ''),
    'instance_id' => env('ZAPI_INSTANCE_ID', ''),
    'client_token' => env('ZAPI_CLIENT_TOKEN', ''),
    'client' => [
        'base_uri' => env('ZAPI_BASE_URI', 'https://api.z-api.io/'),
        'connect_timeout' => 0.0,
        'timeout' => 0.0,
        'debug' => false,
    ],
    'api' => [
        'groups' => \LuanRodrigues\Zapi\Services\GroupsService::class,
        'messages' => \LuanRodrigues\Zapi\Services\MessagesService::class,
        'numbers' => \LuanRodrigues\Zapi\Services\NumbersService::class,
        'instances' => \LuanRodrigues\Zapi\Services\InstancesService::class,
        'webhooks' => \LuanRodrigues\Zapi\Services\WebhooksService::class,
        'communities' => \LuanRodrigues\Zapi\Services\CommunitiesService::class,
        'chats' => \LuanRodrigues\Zapi\Services\ChatsService::class,
    ],
];
