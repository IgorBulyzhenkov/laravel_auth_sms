<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Request;

class VerifyController extends BaseAuthController
{
    public function verifyCode(Request $request){

        $phone  = session('phone');
        $name   = session('name');
        $code   = $request->get('code');
//        dd($request->all());
    }
}
