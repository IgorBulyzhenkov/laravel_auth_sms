<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Redis;

class LoginController extends BaseAuthController
{
    public function createLogin(LoginRequest $loginRequest)
    {
        $data = $loginRequest->validated();

        $user = User::query()
            ->where('phone', $data['phone'])
            ->first();

        if (is_null($user)) {
            return redirect()
                ->route('reg_page')
                ->with('error', 'Такого користувача не існує!');
        }

        $storeCode = Redis::get('sms:' . $user['phone']);

        if(!empty($storeCode)){
            return redirect()
                ->route('verify_page')
                ->with('error', 'Вам вже було відправленно смс з кодом, наступне можна відправити через 5 хвилин!');
        }

        self::sendSmsCode($user['phone'], $user['name']);

        return redirect()
            ->route('verify_page')
            ->with('success', 'Вам відправленно смс з кодом, наступне можна відправити через 5 хвилин!');
    }
}
