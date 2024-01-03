<?php

namespace App\Console\Commands;

use App\Services\TurboSms\TurboSmsService;
use Illuminate\Console\Command;

class SendTurboSms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-turbo-sms';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(TurboSmsService $turboSmsService)
    {
        $phone = ['380967116484'];
        $message = 'My test sms';

        $result = $turboSmsService->sendSms($phone, $message);

        dd($result);
    }
}
