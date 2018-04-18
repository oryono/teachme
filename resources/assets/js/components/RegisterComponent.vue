<template>
    <div class="col col-login mx-auto">
        <div class="text-center mb-6">
            <!--<img src="./assets/brand/tabler.svg" class="h-6" alt="">-->
        </div>
        <form class="card">
            <div class="card-body p-6">
                <div class="card-title">Create new account</div>
                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="Enter name" v-model="name">
                </div>
                <div class="form-group">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" placeholder="Enter email" v-model="email">
                </div>
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="Password" v-model="password">
                </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" />
                        <span class="custom-control-label">Agree the <a href="terms.html">terms and policy</a></span>
                    </label>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block" @click="register">Create new account</button>
                </div>
            </div>
        </form>
        <div class="text-center text-muted">
            Already have account? <router-link to="login">Sign in</router-link>
        </div>
    </div>
</template>

<script>
    import AuthenticationService from "../services/AuthenticationService";

    export default {
        data: function () {
            return {
                name: '',
                email: '',
                password: '',
            }

        },

        methods: {
            async register () {
                try {
                    await AuthenticationService.register({
                        name: this.name,
                        email: this.email,
                        password: this.password,

                    })
                } catch (err) {
                    console.log(err.response.data.error)
                    this.error = err.response.data.error
                }
            }
        }
    }
</script>