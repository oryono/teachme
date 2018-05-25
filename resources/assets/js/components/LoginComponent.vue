<template>
    <div class="page">
        <div class="page-single">
            <div class="container">
                <div class="row">
                    <div class="col col-login mx-auto">
                        <div class="card">
                            <div class="card-body p-6">
                                <div class="card-title">Login to your account</div>
                                <div class="form-group">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" v-model="email" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        Password
                                        <a href="./forgot-password.html" class="float-right small">I forgot password</a>
                                    </label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" v-model="password" required>
                                </div>
                                <div class="form-group">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" />
                                        <span class="custom-control-label">Remember me</span>
                                    </label>
                                </div>
                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary btn-block" @click="login">Sign in</button>
                                </div>
                            </div>
                        </div>
                        <div class="text-center text-muted">
                            Don't have account yet? <router-link to="register">Sign up</router-link>
                        </div>
                    </div>
                </div>
            </div>
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
                return await AuthenticationService.login({
                    email: this.email,
                    password: this.password
                }).then((response) => {
                  this.$store.dispatch('setToken', response.data.token)
                  this.$store.dispatch('setUser', response.data.user)
                  this.$router.push({name: 'home'})
                }).catch((error) => {
                  console.log(error)
                });

            }
        }
    }
</script>