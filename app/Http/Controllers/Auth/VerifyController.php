<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;

class VerifyController extends BaseAuthController
{
    public function verifyCode(Request $request)
    {
        $phone      = session('phone');
        $name       = session('name');
        $code       = $request->get('all-number');

        $resCode    = $this->validateVerificationCode($phone, $code);

        if($resCode){

            $user = User::query()->where('phone', $phone)->first();

            if( is_null($user) ){
                $user = User::query()
                    ->create([
                        'name'  => $name,
                        'phone' => $phone
                    ]);
            }

            Auth::login($user);

            Redis::del('sms:'.auth()->user()->phone);

            return redirect()->route('home')->with('success', 'Вітаю '.auth()->user()->name.'!');
        }

        return redirect()->route('verify_page')->with('error', 'Невірний код!');
    }

    private function validateVerificationCode($phone, $code): bool
    {
        $storeCode = Redis::get('sms:' . $phone);

        return $storeCode && $storeCode === $code;
    }

}

