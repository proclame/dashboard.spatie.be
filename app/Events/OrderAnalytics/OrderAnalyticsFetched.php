<?php

namespace App\Events\OrderAnalytics;

use App\Events\DashboardEvent;

class OrderAnalyticsFetched extends DashboardEvent
{
    public $orderAnalytics;

    public function __construct(string $orderAnalytics)
    {
        $this->orderAnalytics = $orderAnalytics;
    }
}
