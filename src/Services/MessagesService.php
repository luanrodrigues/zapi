<?php

namespace LuanRodrigues\Zapi\Services;

use GuzzleHttp\RequestOptions;

class MessagesService extends BaseService
{
    public function sendMessage(string $phone, string $message)
    {
        return $this->request('POST', 'send-text', [
            'phone' => $phone,
            'message' => $message
        ]);
    }

    public function sendImage(string $phone, string $image, string $caption, $viewOnce = false)
    {
        return $this->request('POST', 'send-image', [
            'phone' => $phone,
            'image' => $image,
            'caption' => $caption,
            'viewOnce' => $viewOnce
        ]);
    }

    public function sendSticker(string $phone, string $sticker)
    {
        return $this->request('POST', 'send-sticker', [
            'phone' => $phone,
            'sticker' => $sticker
        ]);
    }

    public function sendGif(string $phone, string $gif)
    {
        return $this->request('POST', 'send-gif', [
            'phone' => $phone,
            'gif' => $gif
        ]);
    }

    public function sendAudio($phone, $audio, $viewOnce = false)
    {
        return $this->request('POST', 'send-audio', [
            'phone' => $phone,
            'audio' => $audio,
            'viewOnce' => $viewOnce
        ]);
    }

    public function sendDocument($phone, $document, $extension, $fileName = '')
    {
        return $this->request('POST', 'send-document/'.$extension, [
            'phone' => $phone,
            'document' => $document,
            'fileName' => $fileName,
        ]);
    }

    public function sendVideo($phone, $video, $caption = '', $viewOnce = false)
    {
        return $this->request('POST', 'send-video', [
            'phone' => $phone,
            'video' => $video,
            'caption' => $caption,
            'viewOnce' => $viewOnce
        ]);
    }

    public function sendLocation($phone, $latitude, $longitude, $title, $address)
    {
        return $this->request('POST', 'send-location', [
            'phone' => $phone,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'title' => $title,
            'address' => $address
        ]);
    }

    public function sendLink(string $phone, string $message, string $image, string $linkUrl, string $title, string $linkDescription)
    {
        return $this->request('POST', 'send-link', [
            'phone' => $phone,
            'message' => $message .' '. $linkUrl,
            'image' => $image,
            'linkUrl' => $linkUrl,
            'title' => $title,
            'linkDescription' => $linkDescription
        ]);
    }

    public function sendContacts($phone, $contactName, $contactPhone)
    {
        return $this->request('POST', 'send-contact', [
            'phone' => $phone,
            'contactName' => $contactName,
            'contactPhone' => $contactPhone
        ]);
    }


    public function sendPoll($phone, $message, array $poll, $pollMaxOptions = null){
        return $this->request('POST', 'send-poll', [
            'phone' => $phone,
            'message' => $message,
            'pollMaxOptions' => $pollMaxOptions,
            'poll' => $poll
        ]);
    }
}
