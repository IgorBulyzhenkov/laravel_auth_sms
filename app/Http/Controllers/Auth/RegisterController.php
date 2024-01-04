<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;

class RegisterController extends BaseAuthController
{
    public function register(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('auth.register');
    }

    public function create(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::query()
            ->where('phone', $data['phone'])
            ->first();

        if(!is_null($user)){
            return redirect()
                ->route('auth')
                ->with('error', 'Такий користувач вже існує!');
        }

        self::sendSmsCode($data['phone'], $data['name']);

        return redirect()->route('verify_page');
    }

}
