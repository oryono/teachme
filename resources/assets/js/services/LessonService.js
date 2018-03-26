import Api from './Api'

export default {
    index () {
        return Api().get('lessons')
    },

    getUserLessons (userId) {
        return Api().get('users/' + userId + '/lessons')
    },

    getPopularLessons () {
        return Api().get('lessons/popular')
    },

    getUserEnrollments(userId) {
        return Api().get('users/' + userId + '/enrollments')
    },

    createNewCourse (inputs) {
        return Api().post('lessons', inputs)
    },

    deleteLesson(id) {
        return Api().delete('lessons/'+id);
    },

    enroll(lesson_id, inputs) {
        return Api().post('lessons/'+lesson_id + '/enroll', inputs);
    }
}