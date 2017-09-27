<?php

namespace App\Events\Uptime;

use App\Events\DashboardEvent;

class UptimeCheckFailed extends DashboardEvent
{
    /** @var int */
    public $url;

    /** @var int */
    public $startedFailingAt;

    public function __construct($url, $time)
    {
        $this->url = $url;
        $this->startedFailingAt = $time;
    }
}
