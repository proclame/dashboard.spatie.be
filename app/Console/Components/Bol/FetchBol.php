<?php

namespace App\Console\Components\Bol;

use Illuminate\Console\Command;
use App\Events\Bol\BolFetched;

class FetchBol extends Command
{
    protected $signature = 'dashboard:fetch-bol';

    protected $description = 'Fetch Bol Stats';

    public function handle()
    {
        $bol = file_get_contents('https://crm.sportorders.eu/webhook/dashboard.php?tile=bol');

        event(new BolFetched($bol));
    }
}
