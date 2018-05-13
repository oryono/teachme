<template>
    <div>
        <div class="container">
            <div class="page-header">
                <h1 class="page-title">
                    Lessons
                </h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
                                <thead>
                                <tr>
                                    <th>Lesson</th>
                                    <th class="text-center w-1"><i class="icon-people"></i></th>
                                    <th>Instructor</th>
                                    <th class="text-center">Date of class</th>
                                    <th class="text-center"><i class="icon-settings"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="lesson in lessons">
                                    <td>
                                        <div>{{ lesson.course.title }}</div>
                                        <div class="small text-muted">
                                            Created: {{ lesson.start_date }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="avatar d-block"
                                             style="background-image: url(demo/faces/female/26.jpg)">
                                            <span class="avatar-status bg-green"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div>{{ lesson.user.name }}</div>
                                    </td>
                                    <td class="text-center">
                                        <div>
                                            {{ lesson.start_date }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-default"
                                                @click="enroll(lesson.id)">Enroll
                                        </button>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

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
        await LessonService.enroll(lesson_id, {user: this.$store.state.user.id})
        this.$router.push({name: 'home'})

      },
    },

    mounted() {
      return LessonService.index().then((response) => {
          this.lessons = response.data
        }
      ).catch((error) => {
          console.log('error', error)
        }
      )
    }
  }

</script>