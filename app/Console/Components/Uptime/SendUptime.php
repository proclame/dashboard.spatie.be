<?php

namespace App\Console\Components\Uptime;

use Illuminate\Console\Command;
use App\Events\Uptime\UptimeCheckFailed;

class SendUptime extends Command
{
    protected $signature = 'dashboard:send-uptime';

    protected $description = '';

    public function handle()
    {
        event(new UptimeCheckFailed('From Command', '123'));
    }
}
