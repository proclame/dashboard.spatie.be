<?php

namespace App\Events\Uptime;

use App\Events\DashboardEvent;

class UptimeCheckRecovered extends DashboardEvent
{
    /** @var int */
    public $url;

    public function __construct($url)
    {
        $this->url = $url;
    }
}
