import axios from 'axios'
import store from '../store/store'
import router from '../router'
import AuthenticationService from "./AuthenticationService";

const instance = axios.create({
    baseURL: 'http://tutme.test/api',
/*    headers: {
        Authorization: `Bearer ${store.state.token}`
    }*/
})

let self = this;

instance.interceptors.request.use(
    function (request) {
        console.log('request', request);
        let token = `Bearer ${store.state.token}`;

        if (token) {
            //request.headers = request.headers || {}
            request.headers.Authorization = `${token}`
        }

        return request

    },

    /**
     * Here is where we can refresh the token.
     */
    function (error){
        console.log('error', error);
        return Promise.reject(error);

    });


instance.interceptors.response.use((response) => {
    console.log('response', response)
    return response;
}, (error) => {
    console.log(`error ${error}`);
    if (error.response.status === 401 ) {
        return AuthenticationService.refresh().then((result) => {
            store.dispatch('setToken', result.data.token);
            let request = error.config;
            request.headers.Authorization = `Bearer ${result.data.token}`;
            return instance.request(request)
        }).catch(() => {
            router.push({name: 'login'})
        })

    }
    return Promise.reject(error);
});

export default instance

