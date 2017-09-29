<?php

namespace App\Events\Analytics;

use App\Events\DashboardEvent;

class AnalyticsFetched extends DashboardEvent
{
    public $analytics;

    public function __construct(string $analytics)
    {
        $this->analytics = $analytics;
    }
}
