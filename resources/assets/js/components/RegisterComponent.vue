<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h4>Register</h4>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="firstname" v-model="firstname">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="lastname" v-model="lastname">
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" placeholder="email" v-model="email">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="password" v-model="password">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="confirm password" v-model="password_confirmation">
                </div>

                <button class="btn btn-success" @click="register">Login</button>
            </div>
            <div class="col-md-4"></div>

        </div>

    </div>
</template>

<script>
    import AuthenticationService from "../services/AuthenticationService";

    export default {
        data: function () {
            return {
                firstname: '',
                lastname: '',
                email: '',
                password: '',
                password_confirmation: ''
            }

        },

        methods: {
            async register () {
                try {
                    await AuthenticationService.register({
                        firstname: this.firstname,
                        lastname: this.lastname,
                        email: this.email,
                        password: this.password,
                        password_confirmation: this.password_confirmation

                    })
                } catch (err) {
                    console.log(err.response.data.error)
                    this.error = err.response.data.error
                }
            }
        }
    }
</script>