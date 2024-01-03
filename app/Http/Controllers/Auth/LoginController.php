<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;

class LoginController extends BaseAuthController
{
    public function createLogin(LoginRequest $loginRequest)
    {
        $data = $loginRequest->validated();

        $user = User::query()
            ->where('phone', $data['phone'])
            ->first();

        if (is_null($user)) {
            return redirect()->route('reg_page')->with('error', 'Такого користувача не існує!');
        }

        self::putSession($user['phone'], $user['name']);

        $code = self::generateCode();

        // TODO відпарвка смс

        self::redisCode($user['phone'], $code);

        return redirect()->route('verify_page');
    }
}
