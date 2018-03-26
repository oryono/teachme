<template>
    <div class="container-fluid">
        <h4>All Classes</h4>
        <div v-for="lesson in lessons">
            <h4>{{ lesson.course.title }}</h4>
            <p>Starting: {{ lesson.start_date }}</p>
            <button class="btn btn-default"
                    @click="enroll(lesson.id)"
                    :default="!enrolled">Enroll</button>
            <hr>
        </div>

    </div>
</template>

<script>
    import LessonService from "../services/LessonService";

    export default {
        data() {
            return {
                lessons: [],
                enrollments: [],
                enrolled: false

            }
        },

        methods: {
            async enroll(lesson_id) {
                await LessonService.enroll(lesson_id, { user: this.$store.state.user.id} )
                this.$router.push({name : 'home'})

            },

/*            checkEnrollment(user_id, lesson_id) {
                console.log('Reached')
                console.log('enrollents', this.enrollments)
                for (var i=0; i<this.enrollments.length; i++){
                    if (user_id == this.enrollments[i].user_id && lesson_id == this.enrollments[i].user_id) {
                        this.enrolled = true
                    }
                }

            }*/



        },

        async mounted() {
            this.lessons = (await LessonService.index()).data
            console.log('courses', this.courses)

            this.enrollments = (await LessonService.getUserEnrollments(this.$store.state.user.id)).data

        }
    }

</script>