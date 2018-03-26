<template>
    <div class="container-fluid">
        <div><h4>Popular Classes( Lessons )</h4></div>
        <div class="row" >


            <div class="col-md-3" v-for="course in courses">
                {{ course.lesson.course.title }}
            </div>
        </div>

        <hr>
    </div>
</template>

<script>
    import LessonService from "../services/LessonService";

    export default {
        data() {
            return {
                courses: []
            }

        },

        async mounted() {
            this.courses = (await LessonService.getPopularLessons()).data
            console.log(this.courses)
        },

        methods: {

        }
    }
</script>

<style>

</style>