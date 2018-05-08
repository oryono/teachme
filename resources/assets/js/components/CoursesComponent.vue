<template>
    <div>
<!--        <div class="container">
            <h4>All Classes</h4>
            <div v-for="lesson in lessons">
                <h4>{{ lesson.course.title }}</h4>
                <p>Starting: {{ lesson.start_date }}</p>
                <button class="btn btn-default"
                        @click="enroll(lesson.id)">Enroll
                </button>
                <hr>
            </div>
        </div>-->
        <div class="container">
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
                            <thead>
                                <tr>
                                    <th class="text-center w-1"><i class="icon-people"></i></th>
                                    <th>User</th>
                                    <th>Usage</th>
                                    <th class="text-center">Payment</th>
                                    <th>Activity</th>
                                    <th class="text-center">Satisfaction</th>
                                    <th class="text-center"><i class="icon-settings"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="lesson in lessons">
                                    <td class="text-center">
                                        <div class="avatar d-block" style="background-image: url(demo/faces/female/26.jpg)">
                                            <span class="avatar-status bg-green"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div>Elizabeth Martin</div>
                                        <div class="small text-muted">
                                            Registered: Mar 9, 2018
                                        </div>
                                    </td>
                                    <td>
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <strong>42%</strong>
                                            </div>
                                            <div class="float-right">
                                                <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                                            </div>
                                        </div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar bg-yellow" role="progressbar" style="width: 42%"
                                                 aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <i class="payment payment-visa"></i>
                                    </td>
                                    <td>
                                        <div class="small text-muted">Last login</div>
                                        <div>4 minutes ago</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="mx-auto chart-circle chart-circle-xs" data-value="0.42"
                                             data-thickness="3" data-color="blue">
                                            <div class="chart-circle-value">42%</div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="item-action dropdown">
                                            <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i
                                                    class="fe fe-more-vertical"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="javascript:void(0)" class="dropdown-item"><i
                                                        class="dropdown-icon fe fe-tag"></i> Action </a>
                                                <a href="javascript:void(0)" class="dropdown-item"><i
                                                        class="dropdown-icon fe fe-edit-2"></i> Another action </a>
                                                <a href="javascript:void(0)" class="dropdown-item"><i
                                                        class="dropdown-icon fe fe-message-square"></i> Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="javascript:void(0)" class="dropdown-item"><i
                                                        class="dropdown-icon fe fe-link"></i> Separated link</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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