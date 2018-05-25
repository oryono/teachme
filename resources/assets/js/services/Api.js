import axios from 'axios'
import store from '../store/store'
import router from '../router'
import AuthenticationService from "./AuthenticationService";

const instance = axios.create({
  baseURL: 'http://tutme.test/api',
})
instance.interceptors.request.use((request) => {
  let token = store.state.token;

  if (token) {
    request.headers.Authorization = `Bearer ${token}`
  }

  if (token === null && request.url === '/refresh-token') {
    router.push({name: 'login'})
    return false
  }

  return request

}, (error) => {
  return Promise.reject(error);

});


instance.interceptors.response.use(undefined, (response) => {
  //console.log('Response', response.response);
  if (response.response.status === 401) {
    return AuthenticationService.refresh().then((result) => {
      store.dispatch('setToken', result.data.token);
      let request = response.config;
      request.headers.Authorization = `Bearer ${result.data.token}`;
      return instance.request(request)
    }).catch((error) => {
      store.dispatch('setUser', null);
      store.dispatch('setToken', null);
      router.push({name: 'login'})
    })
  }
  return Promise.reject(response);
});

export default instance

