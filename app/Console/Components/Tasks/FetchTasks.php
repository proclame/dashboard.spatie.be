<?php

namespace App\Console\Components\Tasks;

use Illuminate\Console\Command;
use App\Events\Tasks\TasksFetched;
use App\Services\GitHub\GitHubApi;

class FetchTasks extends Command
{
    protected $signature = 'dashboard:fetch-tasks';

    protected $description = 'Fetch team members tasks from GitHub';

    public function handle(GitHubApi $gitHub)
    {
        $tasks['alex'] = 'Veel Taken van alex';

        event(new TasksFetched($tasks));
    }
}
