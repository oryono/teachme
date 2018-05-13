import store from '../store/store'

export default function redirectIfAuthenticated(router) {
  console.log('Middleware running');
  router.beforeEach(function (to, from, next) {
    if (to.meta.requiresAuth) {
      let loggedIn = store.state.isUserLoggedIn;
      let user = store.state.user
      if (loggedIn && user) {
        next();
      } else {
        next({name: 'login'})
      }
    }
    next()
  })

}