<template>
    <div id="app">
        <header-component/>
        <router-view></router-view>
    </div>
</template>

<script>
    import axios from 'axios'
    import HeaderComponent from './HeaderComponent'
    export default {
        name: 'App',
        components: {
            HeaderComponent,


        },

    }

</script>