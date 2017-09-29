<?php

namespace App\Events\Bol;

use App\Events\DashboardEvent;

class BolFetched extends DashboardEvent
{
    public $bol;

    public function __construct(string $bol)
    {
        $this->bol = $bol;
    }
}
