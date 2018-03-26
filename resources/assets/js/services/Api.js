import axios from 'axios'
import store from '../store/store'

export default () => {
    return axios.create({
        baseURL: 'http://lara.test/api',
        headers: {
            Authorization: `Bearer ${store.state.token}`
        }
    })
}