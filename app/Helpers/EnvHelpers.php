<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Arr;

class EnvHelpers
{
    /**
     * Возвращает true с локальной машины
     */
    public static function isLocal(){
        return env('APP_ENV', 'null') === 'local' ;
    }

    /**
     * Возвращает true с продакшн-машины
     */
    public static function isProd(){
        return !self::isLocal() ;
    }

}
