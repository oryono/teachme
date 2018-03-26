<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <router-link class="navbar-brand" to="/">Lara</router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto" v-if="$store.state.isUserLoggedIn">
                <li class="nav-item">
                    <router-link to="/home" class="nav-link">Home</router-link>
                </li>

                <li class="nav-item">
                    <router-link to="/courses/new" class="nav-link">New Course</router-link>
                </li>

                <li class="nav-item">
                    <router-link to="/courses" class="nav-link">Courses</router-link>
                </li>

                <li class="nav-item">
                    <router-link to="/messages" class="nav-link">Messages</router-link>
                </li>

                <li class="nav-item">
                    <router-link to="/Notifications" class="nav-link">Notifications</router-link>
                </li>

            </ul>

            <ul class="navbar-nav" v-if="$store.state.isUserLoggedIn">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ this.fullName }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!--<router-link class="nav-link">logout</router-link>-->
                        <a href="#" class="nav-link" @click="logout">Logout</a>
                    </div>
                </li>
            </ul>

            <ul class="navbar-nav" v-if="!$store.state.isUserLoggedIn">
                <li class="nav-item">
                    <router-link to="/login" class="nav-link">Login</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/register" class="nav-link">Register</router-link>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
    export default {
        name: 'page-header',
        data() {
            return {
                fullName: ''
            }
        },
        methods: {
            logout () {
                this.$store.dispatch('setUser', null)
                this.$store.dispatch('setToken', null)
                this.$router.push({name: 'login'})
            },

            getFullName() {
                return this.$store.state.user.firstname + this.$store.state.user.lastname
            }
        },

        mounted() {
            this.fullName = this.$store.state.user.firstname + " " + this.$store.state.user.lastname
        }

    }
</script>




