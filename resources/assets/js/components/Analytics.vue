<template>
    <tile :position="position" modifiers="overflow">
        <section class="github-file">
            <h1 class="github-file__title">Google Analytics (S&F)</h1>
            <div class="github-file__content" v-html="analytics"></div>
        </section>
    </tile>
</template>

<script>
    import echo from '../mixins/echo';
    import Tile from './atoms/Tile';
    import saveState from 'vue-save-state';

    export default {

        components: {
            Tile,
        },

        mixins: [echo, saveState],

        props: ['position'],

        data() {
            return {
                analytics: '',
            };
        },

        methods: {
            getEventHandlers() {
                return {
                    'Analytics.AnalyticsFetched': response => {
                        this.analytics = response.analytics;
                    },
                };
            },

            getSaveStateConfig() {
                return {
                    cacheKey: `analytics`,
                };
            },
        },
    };
</script>
