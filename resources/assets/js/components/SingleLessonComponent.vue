<template>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                {{ lesson.course.title }} (<span class="text-muted"><router-link :to="'/profile/' + lesson.user.username">{{ lesson.user.name }}</router-link></span>)
            </h1>
        </div>
        <div>
            <button class="btn btn-default mb-2" @click="enroll(lesson.id)">Enroll</button>
        </div>
        <div>
            <div>
                <stretch v-if="loading"></stretch>
            </div>
            <div class="row" :loading="false">
                <div class="col-md-6">
                    <div class="card card-aside">
                        <div class="card-body d-flex flex-column">
                            <div class="">
                                <h4 class="text-muted">Description</h4>
                                <div>
                                    {{ lesson.description }}
                                </div>

                            </div>
                            <div>
                                <div>
                                    Starting date: <span class="text-muted">{{ moment(lesson.start_date).format('MMMM Do YYYY, h:mm') }}</span>
                                </div>
                            </div>

                            <div>
                                <div>
                                    Ending date: <span class="text-muted">{{ moment(lesson.end_date).format('MMMM Do YYYY, h:mm') }}</span>
                                </div>
                            </div>
                            <div>
                                <div>
                                    Location: <span class="text-muted">{{ lesson.location }}</span>
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
  import LessonService from "../services/LessonService";
  import Stretch from 'vue-loading-spinner/src/components/Stretch'
  import moment from 'moment'
  export default {
    components: {
      Stretch
    },
    data() {
      return {
        lesson: null,
        loading: true,
        moment: moment
      }
    },

    methods: {
      async enroll(lesson_id) {
        await LessonService.enroll(lesson_id, {user: this.$store.state.user.id})
        this.$router.push({name: 'home'})

      },
    },

    mounted() {
      return LessonService.getLesson(this.$route.params.id)
        .then((response) => {
          console.log('Response data', response.data);
          this.lesson = response.data
          this.loading = false
        })
    }
  }

</script>