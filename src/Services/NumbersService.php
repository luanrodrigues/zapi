<?php

namespace LuanRodrigues\Zapi\Services;

use Exception;
use GuzzleHttp\RequestOptions;

class NumbersService extends BaseService
{
    public function phoneExists($phone)
    {
        return $this->request('POST', 'phone-exists', [
            'phone' => $phone
        ]);
    }

    public function phoneExistsBatch(array $phones)
    {
        return $this->request('POST', 'phone-exists-batch', [
            'phones' => $phones
        ]);
    }
}
