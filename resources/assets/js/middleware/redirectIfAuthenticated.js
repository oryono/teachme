import store from '../store/store'

export default function redirectIfAuthenticated(router){
    console.log('Middleware running')
    router.beforeEach(function(to, from, next){
        if (to.meta.requiresAuth) {
            let token = store.state.token;
            let user = store.state.user

            if (token && user) {
                next();
            }else {
                next({name: 'login'})
            }
        }

        next()

    })

}