<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\TurboSms\TurboSmsService;
use Illuminate\Support\Facades\Redis;

class BaseAuthController extends Controller
{
    private TurboSmsService $turboSms;

    public function __construct(TurboSmsService $turboSmsService)
    {
        $this->turboSms = $turboSmsService;
    }

    private function putSession($phone, $name): void
    {
        session()->put('name', $name);
        session()->put('phone', $phone);
    }

    private function generateCode(): int
    {
        return rand(1111, 9999);
    }

    private function redisCode($phone, $code): void
    {
        Redis::set('sms:' . $phone, $code);
        Redis::expire('sms:' . $phone, 300);
    }

    protected function sendSmsCode($phone, $name): void
    {
        self::putSession($phone, $name);

        $code = self::generateCode();

        $message = 'Код авторізації '.$code;

        $this->turboSms->sendSms($phone, $message);

        self::redisCode($phone, $code);
    }
}
