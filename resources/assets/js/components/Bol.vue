<template>
    <tile :position="position" modifiers="overflow">
        <section class="github-file">
            <h1 class="github-file__title"><img src="images/bol.com_logo.svg" style="height: 30px; margin-top: 0px"></h1>
            <div class="github-file__content" v-html="bol"></div>
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
                bol: '',
            };
        },

        methods: {
            getEventHandlers() {
                return {
                    'Bol.BolFetched': response => {
                        this.bol = response.bol;
                    },
                };
            },

            getSaveStateConfig() {
                return {
                    cacheKey: `bol`,
                };
            },
        },
    };
</script>
