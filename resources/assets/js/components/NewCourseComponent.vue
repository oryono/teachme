<template>
    <div class="page">
        <div class="page-single">
            <div class="container">
                <div class="row">
                    <div class="col col-login mx-auto">
                        <div class="card">
                            <div class="card-body p-6">
                                <div class="card-title">Create new Course</div>
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
                                    <label for="">Class Size: </label>
                                    <input type="number" class="form-control" required v-model="inputs.class_size">
                                </div>

                                <div class="form-group">
                                    <label for="">Location: </label>
                                    <vue-google-autocomplete
                                            id="map"
                                            classname="form-control"
                                            placeholder="Start typing"
                                            v-on:placechanged="getAddressData"
                                            v-model="inputs.location"
                                            :country="['ug', 'ke']"
                                    >
                                    </vue-google-autocomplete>
                                </div>

                                <div class="form-footer">
                                    <button class="btn btn-primary btn-block" @click="createNewCourse">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import CoursesService from "../services/CoursesService";
    import datePicker from 'vue-bootstrap-datetimepicker';
    import 'eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css'
    import LessonService from "../services/LessonService";
    import VueGoogleAutocomplete from 'vue-google-autocomplete'

    export default {
        components: {
            datePicker,
            VueGoogleAutocomplete
        },
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
                    format: 'DD/MM/YYYY HH:mm',
                    useCurrent: false,
                },

                address: ''
            }
        },

        methods: {
            async createNewCourse() {
                await LessonService.createNewCourse(this.inputs)
                this.$router.push({name : 'home'})

            },

            getAddressData: function (addressData, placeResultData, id) {
                this.address = addressData;
                this.inputs.location = addressData.locality;
            }
        },

        async mounted() {
            this.courses = (await CoursesService.index()).data
            console.log('courses', this.courses)

        }
    }

</script>

<style>

</style>