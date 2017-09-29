import './bootstrap.js';

import Echo from 'laravel-echo';
import Vue from 'vue';

import Dashboard from './components/Dashboard';
import Analytics from './components/Analytics';
import Bol from './components/Bol';
import InternetConnection from './components/InternetConnection';
import Music from './components/Music';
import Orderanalytics from './components/OrderAnalytics';
import TimeWeather from './components/TimeWeather';
import Uptime from './components/Uptime';

new Vue({

    el: '#dashboard',

    components: {
        Dashboard,
        Analytics,
        Bol,
        InternetConnection,
        Music,
        Orderanalytics,
        TimeWeather,
        Uptime,
    },

    created() {

        let options = {
            broadcaster: 'pusher',
            key: window.dashboard.pusherKey,
            cluster: window.dashboard.pusherCluster,
        };

        this.echo = new Echo(options);
    },
});
