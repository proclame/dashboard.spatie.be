<template>
    <tile :position="position" modifiers="overflow">
        <section class="github-file it-todo">
            <h1 class="github-file__title">IT Todo</h1>
            <div class="github-file__content" v-html="itTodo"></div>
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
                itTodo: '',
            };
        },

        methods: {
            getEventHandlers() {
                return {
                    'ItTodo.ItTodoFetched': response => {
                        this.itTodo = response.ItTodo;
                    },
                };
            },

            getSaveStateConfig() {
                return {
                    cacheKey: `itTodo`,
                };
            },
        },
    };
</script>
