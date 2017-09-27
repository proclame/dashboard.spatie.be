<?php

namespace App\Notifications\Uptime;

use Carbon\Carbon;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Spatie\UptimeMonitor\Models\Enums\UptimeStatus;
use Illuminate\Notifications\Messages\SlackAttachment;
use Spatie\UptimeMonitor\Notifications\BaseNotification;
use Spatie\UptimeMonitor\Events\UptimeCheckRecovered as MonitorRecoveredEvent;
use App\Events\Uptime\UptimeCheckRecovered as UptimeCheckRecoveredEvent;

class UptimeCheckRecovered extends \Spatie\UptimeMonitor\Notifications\Notifications\UptimeCheckRecovered
{
    public function toBroadcast($notifiable)
    {
        return event(new UptimeCheckRecoveredEvent($this->getUrl()));
    }

    protected function getUrl(): string
    {
        return "{$this->event->monitor->url}";
    }

}
