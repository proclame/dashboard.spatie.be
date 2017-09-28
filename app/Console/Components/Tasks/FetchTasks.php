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
        $tasks['alex'] = 'Minder Taken van alex<br>
        <ul><li>Test 1123</li><li>Test 11235</li></ul>
        <table style="width:100%">
        <tr><td>sdfljsdf</td><td style="text-align: right;">--sfldsjfs</td></tr>
        <tr><td>sdfljsdf</td><td>--sfldsjfs</td></tr>
        </table>';

        event(new TasksFetched($tasks));
    }
}
