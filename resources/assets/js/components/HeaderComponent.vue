<template>

    <div>
        <div class="header py-4">
            <div class="container">
                <div class="d-flex">
                    <a class="header-brand" href="./index.html">
                        <img src="/demo/brand/tabler.svg" class="header-brand-img" alt="tabler logo">
                    </a>

                    <div>
                        <ul class="nav border-0 flex-column flex-lg-row" v-if="$store.state.isUserLoggedIn">
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

                            <li class="nav-item">
                                <router-link to="/collegues" class="nav-link">Collegues</router-link>
                            </li>

                        </ul>

                        <ul class="nav border-0 flex-column flex-lg-row" v-if="!$store.state.isUserLoggedIn">
                            <li class="nav-item">
                                <router-link to="/login" class="nav-link">Login</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/register" class="nav-link">Register</router-link>
                            </li>
                        </ul>
                    </div>


                    <div class="d-flex order-lg-2 ml-auto" v-if="$store.state.isUserLoggedIn">
                        <div class="dropdown d-none d-md-flex">
                            <a class="nav-link icon" data-toggle="dropdown">
                                <i class="fe fe-bell"></i>
                                <span class="nav-unread"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a href="#" class="dropdown-item d-flex">
                                    <span class="avatar mr-3 align-self-center"
                                          style="background-image: url(/demo/faces/male/41.jpg)"></span>
                                    <div>
                                        <strong>Nathan</strong> pushed new commit: Fix page load performance issue.
                                        <div class="small text-muted">10 minutes ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item d-flex">
                                    <span class="avatar mr-3 align-self-center"
                                          style="background-image: url(/demo/faces/female/1.jpg)"></span>
                                    <div>
                                        <strong>Alice</strong> started new task: Tabler UI design.
                                        <div class="small text-muted">1 hour ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item d-flex">
                                    <span class="avatar mr-3 align-self-center"
                                          style="background-image: url(/demo/faces/female/18.jpg)"></span>
                                    <div>
                                        <strong>Rose</strong> deployed new version of NodeJS REST Api V3
                                        <div class="small text-muted">2 hours ago</div>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item text-center text-muted-dark">Mark all as read</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                                <span class="avatar" style="background-image: url(/demo/faces/female/25.jpg)"></span>
                                <span class="ml-2 d-none d-lg-block">
                                    <span class="text-default">{{ $store.state.user.name }}</span>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="#">
                                    <i class="dropdown-icon fe fe-user"></i> Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="dropdown-icon fe fe-settings"></i> Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <span class="float-right"><span class="badge badge-primary">6</span></span>
                                    <i class="dropdown-icon fe fe-mail"></i> Inbox
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="dropdown-icon fe fe-send"></i> Message
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">
                                    <i class="dropdown-icon fe fe-help-circle"></i> Need help?
                                </a>
                                <a class="dropdown-item" href="#" @click="logout">
                                    <i class="dropdown-icon fe fe-log-out"></i> Sign out
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                        <span class="header-toggler-icon"></span>
                    </a>
                </div>
            </div>
        </div>

    </div>
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
                return this.$store.state.user.name
            }
        },

        mounted() {
            this.fullName = this.$store.state.user.name
        }

    }
</script>




