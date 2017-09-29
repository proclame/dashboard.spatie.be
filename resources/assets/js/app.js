import './bootstrap.js';

import Echo from 'laravel-echo';
import Vue from 'vue';

import Dashboard from './components/Dashboard';
import Analytics from './components/Analytics';
import Bol from './components/Bol';
import Calendar from './components/Calendar';
import Github from './components/Github';
import InternetConnection from './components/InternetConnection';
import Music from './components/Music';
import Packagist from './components/Packagist';
import Tasks from './components/Tasks';
import TimeWeather from './components/TimeWeather';
import Twitter from './components/Twitter';
import Uptime from './components/Uptime';

new Vue({

    el: '#dashboard',

    components: {
        Dashboard,
        Analytics,
        Bol,
        Calendar,
        Github,
        InternetConnection,
        Music,
        Packagist,
        Tasks,
        TimeWeather,
        Twitter,
        Uptime,
    },

    created() {

        let options = {
            broadcaster: 'pusher',
            key: window.dashboard.pusherKey,
            cluster: window.dashboard.pusherCluster,
        };

        if (window.dashboard.usingNodeServer) {
            options = {
                broadcaster: 'socket.io',
                host: 'http://dashboard.spatie.be:6001',
            };
        }

        this.echo = new Echo(options);
    },
});
