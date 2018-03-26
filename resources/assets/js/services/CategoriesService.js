import Api from './Api'

export default {
    index () {
        return Api().get('categories')
    },

    getPopularCategories () {
        return Api().get('categories/popular')
    }
}