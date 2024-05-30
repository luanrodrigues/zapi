<?php

namespace LuanRodrigues\Zapi\Services;

class WebhooksService extends BaseService
{
    public function updateWebhookDelivery($url)
    {
        return $this->request('PUT', 'update-webhook-delivery', [
            'url' => $url
        ]);
    }
    public function updateWebhookReceived($url)
    {
        return $this->request('PUT', 'update-webhook-received', [
            'url' => $url
        ]);
    }

    public function updateWebhookDisconnected($url)
    {
        return $this->request('PUT', 'update-webhook-disconnected', [
            'url' => $url
        ]);
    }

    public function updateWebhookMessageStatus($url)
    {
        return $this->request('PUT', 'update-webhook-message-status', [
            'url' => $url
        ]);
    }

    public function updateWebhookChatPresence($url)
    {
        return $this->request('PUT', 'update-webhook-chat-presence', [
            'url' => $url
        ]);
    }

    public function updateWebhookConnected($url)
    {
        return $this->request('PUT', 'update-webhook-connected', [
            'url' => $url
        ]);
    }
}
