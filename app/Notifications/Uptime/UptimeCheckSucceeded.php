<?php

namespace App\Notifications\Uptime;

use Carbon\Carbon;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Spatie\UptimeMonitor\Models\Enums\UptimeStatus;
use Illuminate\Notifications\Messages\SlackAttachment;
use Spatie\UptimeMonitor\Notifications\BaseNotification;
use Spatie\UptimeMonitor\Events\UptimeCheckSucceeded as MonitorSucceededEvent;
use App\Events\Uptime\UptimeCheckSucceeded as UptimeCheckSucceededEvent;

class UptimeCheckSucceeded extends \Spatie\UptimeMonitor\Notifications\Notifications\UptimeCheckSucceeded
{
    public function toBroadcast($notifiable)
    {
        return event(new UptimeCheckSucceededEvent($this->getUrl()));
    }

    protected function getUrl(): string
    {
        return "{$this->event->monitor->url}";
    }

}
