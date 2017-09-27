<?php

namespace App\Events\Uptime;

use App\Events\DashboardEvent;

class UptimeCheckSucceeded extends DashboardEvent
{
    /** @var int */
    public $url;

    public function __construct($url)
    {
        $this->url = $url;
    }
}
