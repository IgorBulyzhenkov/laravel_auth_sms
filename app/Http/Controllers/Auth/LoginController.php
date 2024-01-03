<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;

class LoginController extends BaseAuthController
{
    public function create(LoginRequest $loginRequest){

        $data = $loginRequest->validated();

        $user = User::query()
            ->where('phone', $data['phone'])
            ->first();

        if(is_null($user)){
            return redirect()->route('reg_page')->with('error', 'Такого користувача не існує!');
        }

        $code = self::generateCode();

        // TODO відпарвка смс

        self::redisCode($data['phone'], $code);

        return redirect()->route('verify_page');
    }
}
