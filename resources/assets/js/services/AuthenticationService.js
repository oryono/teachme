import Api from './Api'

export default {
    register (credentials) {
        return Api.post('/auth/register', credentials)
    },
    login (credentials) {
        return Api.post('auth/token', credentials)
    },
    refresh() {
        return Api.get('refresh-token')
    }
}