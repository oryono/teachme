<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h4>Login to Lara</h4>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="email" v-model="email" required>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="password" v-model="password" required>
                </div>

                <button class="btn btn-success" @click="login">Login</button>

            </div>
            <div class="col-md-4"></div>

        </div>
    </div>
</template>

<script>
    import AuthenticationService from "../services/AuthenticationService";

    export default {
        data: () => {
            return {
                email: '',
                password: ''
            }

        },

        methods: {
            async login () {
                const response = await AuthenticationService.login({
                    email: this.email,
                    password: this.password
                })
                this.$store.dispatch('setToken', response.data.token)
                this.$store.dispatch('setUser', response.data.user)
                this.$router.push({name: 'home'})
            }
        }
    }
</script>