<?php

namespace LuanRodrigues\Zapi\Services;

class InstancesService extends BaseService
{
    public function updateAutoReadMessage($value)
    {
        return $this->request('PUT', 'update-auto-read-message', [
            'value' => $value
        ]);
    }

    public function updateProfilePicture($profilePictureUrl)
    {
        return $this->request('PUT', 'profile-picture', [
            'value' => $profilePictureUrl
        ]);
    }

    public function updateProfileName($profileName)
    {
        return $this->request('PUT', 'profile-name', [
            'value' => $profileName
        ]);
    }

    public function updateProfileDescription($profileDescription)
    {
        return $this->request('PUT', 'profile-description', [
            'value' => $profileDescription
        ]);
    }

    public function updateCallRejectAuto($value)
    {
        return $this->request('PUT', 'update-call-reject-auto', [
            'value' => $value
        ]);
    }

    public function updateCallRejectMessage($value)
    {
        return $this->request('PUT', 'update-call-reject-message', [
            'value' => $value
        ]);
    }

    public function getQrCode()
    {
        return $this->request('GET', 'qr-code');
    }

    public function getQrCodeImage()
    {
        return $this->request('GET', 'qr-code/image');
    }

    public function getPhoneCode($phone)
    {
        return $this->request('GET', 'phone-code/'.$phone);
    }

    public function restartInstance()
    {
        return $this->request('GET', 'restart');
    }

    public function disconnectInstance($token)
    {
        return $this->request('GET', 'instances/'.config('zapi.instance_id').'/token/'.$token.'/disconnect');
    }

    public function getStatus()
    {
        return $this->request('GET', 'status');
    }

    public function getDevice()
    {
        return $this->request('GET', 'device');
    }

    public function updateName($name)
    {
        return $this->request('PUT', 'update-name', [
            'value' => $name
        ]);
    }
}
