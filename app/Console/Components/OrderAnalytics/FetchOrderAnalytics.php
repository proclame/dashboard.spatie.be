<?php

namespace App\Console\Components\OrderAnalytics;

use Illuminate\Console\Command;
use App\Events\OrderAnalytics\OrderAnalyticsFetched;

class FetchOrderAnalytics extends Command
{
    protected $signature = 'dashboard:fetch-order-analytics';

    protected $description = 'Fetch Order Analytics';

    public function handle()
    {
        $orderAnalytics = file_get_contents('https://crm.sportorders.eu/webhook/dashboard.php?tile=order_count');

        event(new OrderAnalyticsFetched($orderAnalytics));
    }
}
