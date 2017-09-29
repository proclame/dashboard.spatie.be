<?php

namespace App\Console\Components\Analytics;

use Carbon\Carbon;
use Spatie\Analytics\Analytics;
use Spatie\Analytics\AnalyticsClient;
use Spatie\Analytics\Period;
use Illuminate\Console\Command;
use App\Events\Analytics\AnalyticsFetched;

class FetchAnalytics extends Command
{
    protected $signature = 'dashboard:fetch-analytics';

    protected $description = 'Fetch Analytics Stats';

    public function handle()
    {

        $analytics = "analytics";

        $client = app(AnalyticsClient::class);
        $analytics = new Analytics($client, env('ANALYTICS_VIEW_ID'));
        $visitors['Today'] = ($analytics->performQuery(Period::days(0), 'ga:users'))->totalsForAllResults['ga:users'];
        $visitors['Yesterday'] = ($analytics->performQuery(Period::create(Carbon::yesterday(), Carbon::yesterday()), 'ga:users'))->totalsForAllResults['ga:users'];
        $visitors['30Days'] = ($analytics->performQuery(Period::create(Carbon::now()->subDays(30), Carbon::today()), 'ga:users'))->totalsForAllResults['ga:users'];
        $visitors['365Days'] = ($analytics->performQuery(Period::create(Carbon::now()->subDays(365), Carbon::today()), 'ga:users'))->totalsForAllResults['ga:users'];

        event(new AnalyticsFetched(view('tiles.analytics', ['visitors' => $visitors])));
    }
}
