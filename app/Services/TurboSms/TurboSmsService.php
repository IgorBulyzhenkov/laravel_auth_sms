<?php

namespace App\Services\TurboSms;

use App\Exceptions\ExceptionHelper;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class TurboSmsService
{
    protected string $url;
    protected string $token;
    protected Client $client;

    public function __construct()
    {
        $this->token    = 'Bearer '.env('TURBO_SMS_TOKEN');
        $this->url      = 'https://api.turbosms.ua/message/send.json';
        $this->client   = new Client();
    }

    public function sendSms($phone, $message): \Illuminate\Http\JsonResponse|string
    {

        try {

            $response = $this->client->post($this->url, [
                'headers' => [
                    'Content-Type'  => 'application/x-www-form-urlencoded',
                    'Authorization' => $this->token
                ],
                'form_params'       => $this->arrParams($phone, $message),
            ]);

            return $response->getBody()->getContents();

        }catch(RequestException $e){

            return response()->json( ExceptionHelper::returnResponseData($e), 400);

        }
    }

    private function arrParams($phone, $message): array
    {
        return [
            'recipients'    => $phone,
            'sms'           => [ 'sender' => env('TURBO_SMS_SENDER'), 'text' => $message ],
        ];
    }
}
