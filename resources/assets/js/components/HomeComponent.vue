<template>
    <div class="container-fluid">
        <h4>My Lessons (I have created)<span class="float-right"><router-link to="/courses/new" class="btn btn-default">Create new class</router-link></span></h4>
        <hr>
        <div class="row">
            <div v-for="(lesson, index) in lessons" :id="lesson.id" class="col-md-3" style="background-color: #cccccc; border: 1px solid; margin: 10px; padding: 10px">
                <div>{{ lesson.course.title }} <i class="float-right"><a v-on:click="deleteLesson(lesson, index)" href="#">Delete</a></i></div>
                <hr>
                <div>Location: {{ lesson.location }}</div>
                <div>Starting: {{ lesson.start_date }}</div>
                <div>Ending: {{ lesson.end_date }}</div>
                <div>Class size: {{ lesson.class_size }}</div>
            </div>
        </div>

        <h4>Enrollments <span class="float-right"><router-link to="/courses" class="btn btn-default">Enroll for new Courses</router-link></span></h4>
        <hr>
        <div class="row">
            <div v-for="enrollment in enrollments" v-bind:key="enrollment.id" class="col-md-3" style="background-color: #cccccc; border: 1px solid; margin: 10px; padding: 10px">
                <div>{{ enrollment.lesson.course.title }}</div>
            </div>
        </div>
    </div>


</template>

<script>
    import LessonService from '../services/LessonService'

    export default {
        name: 'home',
        data () {
            return {
                lessons: [],
                enrollments: []
            }
        },

        async mounted () {
            if (this.$store.state.user === null){
                this.$router.push({name: 'login'})
            }
            this.lessons = (await LessonService.getUserLessons(this.$store.state.user.id)).data
            console.log(this.lessons)

            this.enrollments = (await LessonService.getUserEnrollments(this.$store.state.user.id)).data
            console.log('enrollments', this.enrollments)

        },

        watch: {
        },

        methods: {
            async deleteLesson(lesson, index) {
                console.log('index', index)
                await LessonService.deleteLesson(lesson.id)
                this.lessons.splice(index, 1)
            }
        }
    }
</script>
<style></style>