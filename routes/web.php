<?php

use Spatie\Analytics\Period;

Route::group(['middleware' => 'auth.basic'], function () {
    Route::get('/', 'DashboardController@index');
});

Route::post('/webhook/github', 'GitHubWebhookController@gitRepoReceivedPush');

Route::get('/test', function () {

    // "ids=ga%3A75035742&start-date=2017-09-29&end-date=2017-09-29&metrics=ga%3Ausers"
    $analyticsData = Analytics::performQuery(Period::days(0), 'ga:users,ga:pageviews');
    dd($analyticsData);
});
