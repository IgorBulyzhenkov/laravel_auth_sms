<?php

namespace App\Exceptions;

use App\Helpers\EnvHelpers;
use Exception;

class ExceptionHelper extends Exception
{
    public static function returnResponseData( \Throwable $e){
        return array_filter([
            'status' => 'error',
            'error' => [
                'description' => $e->getMessage()
            ],
            "debug" => EnvHelpers::isLocal() ? [
                "place" => $e->getFile() . ':' . $e->getLine(),
                "trace" => $e->getTraceAsString()
            ] : []
        ]);
    }
}
