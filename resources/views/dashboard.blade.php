@extends('layouts/master')

@section('content')

@javascript(compact('pusherKey', 'pusherCluster', 'usingNodeServer'))

<dashboard id="dashboard" columns="4" rows="3">
    <bol position="b1"></bol>
    <orderAnalytics position="b2"></orderAnalytics>
    <analytics position="b3"></analytics>
    <uptime position="c3"></uptime>
    <music position="d3"></music>
    <time-weather position="d2" date-format="ddd DD/MM" time-zone="America/New_York" weather-city="Miami"></time-weather>
    <time-weather position="d1" date-format="ddd DD/MM" time-zone="Europe/Brussels" weather-city="Herentals"></time-weather>
    <internet-connection></internet-connection>
</dashboard>

@endsection
