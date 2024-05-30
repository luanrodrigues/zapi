<?php

namespace LuanRodrigues\Zapi\Facades;

use Illuminate\Support\Facades\Facade;

class Zapi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'zapi';
    }
}
