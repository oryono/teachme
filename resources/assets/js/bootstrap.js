window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    // require('bootstrap-sass');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.interceptors.response.use(function(request, next){
    console.log('Interceptor');
    /**
     * Here we will fetch the token from local storage and
     * attach it (if exists) to the Authorization header on EVERY request.
     */
    let token = window.localStorage.getItem('token')

    if (token) {
        request.headers = request.headers || {}
        request.headers.Authorization = `Bearer ${token}`
    }

    /**
     * Here is where we can refresh the token.
     */
    next((response) => {
        /**
         * If we get a 401 response from the API means that we are Unauthorized to
         * access the requested end point.
         * This means that probably our token has expired and we need to get a new one.
         */
        if (response.status === 401) {
            return Vue.http.get('http://api.dev/refresh-token').then((result) => {
                // Save the new token on local storage
                window.localStorage.setItem('token', result.data.token)

                // Resend the failed request whatever it was (GET, POST, PATCH) and return its resposne
                return Vue.http(request).then((response) => {
                    return response
                })
            })
                .catch(() => {
                    /**
                     * We weren't able to refresh the token so the best thing to do is
                     * logout the user (removing any user information from storage)
                     * and redirecting to login page
                     */
                    this.$router.push({name: 'login'})
                })
        }
    })
});

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key',
//     cluster: 'mt1',
//     encrypted: true
// });


