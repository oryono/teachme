<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <H4>New Course</H4>
                    <div class="alert alert-success alert-dismissable" v-if="success">
                        Successfully Created New Course
                    </div>
                    <div class="form-group">
                        <label for="course">Course: </label>
                        <select name="course" class="form-control" required v-model="inputs.course_id">
                            <option v-for="course in courses" :value="course.id">
                                {{ course.title }}
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Description: </label>
                        <textarea class="form-control" required v-model="inputs.description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Starting at: </label>
                        <date-picker v-model="inputs.start_date"></date-picker>
                    </div>
                    <div class="form-group">
                        <label for="">Ending at: </label>
                        <date-picker v-model="inputs.end_date"></date-picker>
                    </div>
                    <div class="form-group">
                        <label for="">Location: </label>
                        <input type="text" class="form-control" required v-model="inputs.location">
                    </div>
                    <div class="form-group">
                        <label for="">Class Size: </label>
                        <input type="text" class="form-control" required v-model="inputs.class_size">
                    </div>

                    <button class="btn btn-default" @click="createNewCourse">Submit</button>
            </div>
        </div>

    </div>
</template>

<script>
    import CoursesService from "../services/CoursesService";
    import datePicker from 'vue-bootstrap-datetimepicker';
    import 'eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css'
    import LessonService from "../services/LessonService";

    export default {
        components: { datePicker },
        data() {
            return {
                courses: [],

                success: false,

                inputs: {
                    course_id: null,
                    user_id: this.$store.state.user.id,
                    description: '',
                    start_date: '',
                    end_date: '',
                    location: '',
                    class_size: null
                },

                config: {
                    format: 'DD/MM/YYYY hh:mm',
                    useCurrent: false,
                }
            }
        },

        methods: {
            async createNewCourse() {
                await LessonService.createNewCourse(this.inputs)
                this.$router.push({name : 'home'})

            },
        },

        async mounted() {
            this.courses = (await CoursesService.index()).data
            console.log('courses', this.courses)

        }
    }

</script>

<style>

</style>