<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class BaseAuthController extends Controller
{
    protected function putSession($phone, $name): void
    {
        session()->put('name', $name);
        session()->put('phone', $phone);
    }

    protected function generateCode(): int
    {
        return rand(1111, 9999);
    }

    protected function redisCode($phone, $code)
    {
        Redis::set('sms:' . $phone, $code);
        Redis::expire('sms:' . $phone, 300);
    }
}
