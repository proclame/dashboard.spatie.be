<?php

namespace App\Notifications\Uptime;

use Carbon\Carbon;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Spatie\UptimeMonitor\Models\Enums\UptimeStatus;
use Illuminate\Notifications\Messages\SlackAttachment;
use Spatie\UptimeMonitor\Notifications\BaseNotification;
use Spatie\UptimeMonitor\Events\UptimeCheckFailed as MonitorFailedEvent;
use App\Events\Uptime\UptimeCheckFailed as UptimeCheckFailedEvent;

class UptimeCheckFailed extends \Spatie\UptimeMonitor\Notifications\Notifications\UptimeCheckFailed
{
    public function toBroadcast($notifiable)
    {
        return event(new UptimeCheckFailedEvent($this->getUrl(), $this->getSince()));
    }

    protected function getUrl(): string
    {
        return "{$this->event->monitor->url}";
    }

    protected function getSince(): string
    {
        return "Since {$this->event->downtimePeriod->startDateTime->format('H:i')} ({$this->event->monitor->formattedLastUpdatedStatusChangeDate()})";
    }
}
