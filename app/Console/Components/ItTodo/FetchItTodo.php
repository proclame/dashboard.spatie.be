<?php

namespace App\Console\Components\ItTodo;

use Illuminate\Console\Command;
use App\Events\ItTodo\ItTodoFetched;

class FetchItTodo extends Command
{
    protected $signature = 'dashboard:fetch-it-todo';

    protected $description = 'Fetch IT Todo';

    public function handle()
    {
        $tasks = file_get_contents('https://crm.sportorders.eu/webhook/dashboard.php?tile=tasks');

        event(new ItTodoFetched($tasks));
    }
}
