<template>
    <tile :position="position" modifiers="overflow">
        <section class="github-file">
            <h1 class="github-file__title">Bestellingen</h1>
            <div class="github-file__content" v-html="orderAnalytics"></div>
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
                orderAnalytics: '',
            };
        },

        methods: {
            getEventHandlers() {
                return {
                    'OrderAnalytics.OrderAnalyticsFetched': response => {
                        this.orderAnalytics = response.orderAnalytics;
                    },
                };
            },

            getSaveStateConfig() {
                return {
                    cacheKey: `orderAnalytics`,
                };
            },
        },
    };
</script>
