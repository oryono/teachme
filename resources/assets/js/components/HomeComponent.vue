<template>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Classes <span class="float-right"><router-link to="/courses/new" class="btn btn-default">Create a new class</router-link></span>
            </h1>
        </div>

        <div>
            <div><stretch v-if="loading"></stretch></div>
            <div class="row" :loading="false">
                <div class="col-md-3" v-for="lesson in lessons">
                    <div class="card card-aside">
                        <div class="card-body d-flex flex-column">
                            <h4><a href="#">{{ lesson.course.title }}</a></h4>
                            <div class="text-muted">{{ lesson.course.description }}
                            </div>
                            <div class="d-flex align-items-center pt-5 mt-auto">
                                <div class="avatar avatar-md mr-3"
                                     style="background-image: url(/demo/faces/female/18.jpg)"></div>
                                <div>
                                    <a href="./profile.html" class="text-default">{{ lesson.user.name }}</a>
                                    <small class="d-block text-muted">{{ moment(lesson.start_date).fromNow() }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="page-header">
            <h1 class="page-title">
                Enrollments <span class="float-right"><router-link to="/courses" class="btn btn-default">Enroll for new Courses</router-link></span>
            </h1>
        </div>
        <div>
            <div><stretch v-if="loading"></stretch></div>
            <div class="row" :loading="false">
                <div class="col-md-3" v-for="enrollment in enrollments">
                    <div class="card card-aside">
                        <div class="card-body d-flex flex-column">
                            <h4><a href="#">{{ enrollment.lesson.course.title }}</a></h4>
                            <div class="text-muted">{{ enrollment.lesson.course.description }}
                            </div>
                            <div class="d-flex align-items-center pt-5 mt-auto">
                                <div class="avatar avatar-md mr-3"
                                     style="background-image: url(/demo/faces/female/18.jpg)"></div>
                                <div>
                                    <a href="./profile.html" class="text-default">{{ enrollment.lesson.user.name }}</a>
                                    <small class="d-block text-muted">{{ moment(enrollment.lesson.start_date).fromNow() }}
                                    </small>
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
  import LessonService from '../services/LessonService'
  import moment from 'moment'
  import Stretch from 'vue-loading-spinner/src/components/Stretch'

  export default {
    components: {
      Stretch
    },
    name: 'home',
    data() {
      return {
        lessons: [],
        enrollments: [],
        moment: moment,
        loading: true,
      }
    },

    async mounted() {
      if (this.$store.state.user) {
        await LessonService.getUserLessons(this.$store.state.user.id).then((response) => {
          this.lessons = response.data
          this.loading = false
        }, (error) => {
          console.log(error)
        })
      }

      if (this.$store.state.user) {
        await LessonService.getUserEnrollments(this.$store.state.user.id)
          .then((response) => {
            this.enrollments = response.data
            this.loading = false
          }, (error) => {
            console.log(error)
          })
      }

    },

    watch: {},

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