<?php

namespace App\Events\ItTodo;

use App\Events\DashboardEvent;

class ItTodoFetched extends DashboardEvent
{
    public $ItTodo;

    public function __construct(string $ItTodo)
    {
        $this->ItTodo = $ItTodo;
    }
}
