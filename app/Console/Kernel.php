<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Components\Analytics\FetchAnalytics::class,
        \App\Console\Components\Bol\FetchBol::class,
        \App\Console\Components\ItTodo\FetchItTodo::class,
        \App\Console\Components\InternetConnection\SendHeartbeat::class,
        \App\Console\Components\Music\FetchCurrentTrack::class,
        \App\Console\Components\OrderAnalytics\FetchOrderAnalytics::class,
        UpdateDashboard::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('dashboard:fetch-current-track')->everyMinute();
        $schedule->command('dashboard:send-heartbeat')->everyMinute();
        $schedule->command('dashboard:fetch-order-analytics')->everyFiveMinutes();
        $schedule->command('dashboard:fetch-analytics')->everyHour();
        $schedule->command('dashboard:fetch-bol')->everyFiveMinutes();
        $schedule->command('dashboard:fetch-it-todo')->everyHour();
        $schedule->command('monitor:check-uptime')->everyMinute();
        $schedule->command('monitor:check-certificate')->daily();
    }
}
