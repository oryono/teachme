import Api from './Api'

export default {
    index () {
        return Api.get('/courses')
    },

    getPopularCategories () {
        return Api.get('categories/popular');
    },


}