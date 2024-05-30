<?php

namespace LuanRodrigues\Zapi\Services;

use Exception;
use GuzzleHttp\RequestOptions;

class ChatsService extends BaseService
{
    public function getChats($page = 1, $pageSize = 20)
    {
        return $this->request('GET', 'chats?page='.$page.'&pageSize='.$pageSize);
    }

    public function getChat($phone)
    {
        return $this->request('GET', 'chats/'.$phone);
    }

    public function modifyChat($phone, $action)
    {
        $allowedActions = ["archive", "unarchive", "read", "unread", "clear", "mute", "unmute", "delete"];

        if (!in_array($action, $allowedActions)) {
            throw new Exception("Ação inválida: $action. Ações permitidas: " . implode(', ', $allowedActions));
        }

        return $this->request('POST', 'modify-chat', [
            'phone' => $phone,
            'action' => $action //"archive" ou "unarchive" ou "read" ou "unread" ou "clear" ou "mute" ou "unmute" ou "delete"
        ]);
    }

    public function sendChatExpiration($phone, $expiration)
    {
        // Defina os valores permitidos para 'expiration'
        $allowedExpirations = ["24_HOURS", "7_DAYS", "90_DAYS", "OFF"];

        // Verifique se o valor de 'expiration' é permitido
        if (!in_array($expiration, $allowedExpirations)) {
            throw new Exception("Valor de expiração inválido: $expiration. Valores permitidos: " . implode(', ', $allowedExpirations));
        }

        return $this->request('POST', 'send-chat-expiration', [
            'phone' => $phone,
            'chatExpiration' => $expiration //"24_HOURS", "7_DAYS", "90_DAYS", "OFF"
        ]);
    }

}
