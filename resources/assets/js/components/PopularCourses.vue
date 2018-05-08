<template>
    <div>
        <div><stretch v-if="loading"></stretch></div>
        <div class="row" :loading="false">
            <div class="col-md-3" v-for="course in courses">
                <div class="card card-aside">
                    <div class="card-body d-flex flex-column">
                        <h4><a href="#">{{ course.lesson.course.title }}</a></h4>
                        <div class="text-muted">{{ course.lesson.course.description }}
                        </div>
                        <div class="d-flex align-items-center pt-5 mt-auto">
                            <div class="avatar avatar-md mr-3"
                                 style="background-image: url(/demo/faces/female/18.jpg)"></div>
                            <div>
                                <a href="./profile.html" class="text-default">Rose Bradley</a>
                                <small class="d-block text-muted">3 days ago</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import LessonService from "../services/LessonService";
    import Stretch from 'vue-loading-spinner/src/components/Stretch'

    export default {
        components: {
            Stretch
        },
        data() {
            return {
                courses: [],
                loading: true
            }

        },

        async mounted() {
            let self = this
            return await LessonService.getPopularLessons()
                .then(function (response) {
                    self.courses = response.data
                    self.loading = false
                })
        },

        methods: {

        }
    }
</script>

<style>

</style>