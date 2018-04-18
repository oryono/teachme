<template>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Dashboard
            </h1>
        </div>

        <div class="row row-cards">
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-right text-green">
                            6%
                            <i class="fe fe-chevron-up"></i>
                        </div>
                        <div class="h1 m-0">43</div>
                        <div class="text-muted mb-4">New Tickets</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-right text-red">
                            -3%
                            <i class="fe fe-chevron-down"></i>
                        </div>
                        <div class="h1 m-0">17</div>
                        <div class="text-muted mb-4">Closed Today</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-right text-green">
                            9%
                            <i class="fe fe-chevron-up"></i>
                        </div>
                        <div class="h1 m-0">7</div>
                        <div class="text-muted mb-4">New Replies</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-right text-green">
                            3%
                            <i class="fe fe-chevron-up"></i>
                        </div>
                        <div class="h1 m-0">27.3K</div>
                        <div class="text-muted mb-4">Followers</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-right text-red">
                            -2%
                            <i class="fe fe-chevron-down"></i>
                        </div>
                        <div class="h1 m-0">$95</div>
                        <div class="text-muted mb-4">Daily Earnings</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                    <div class="card-body p-3 text-center">
                        <div class="text-right text-red">
                            -1%
                            <i class="fe fe-chevron-down"></i>
                        </div>
                        <div class="h1 m-0">621</div>
                        <div class="text-muted mb-4">Products</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cards row-deck">
            <div class="col-lg-6">
                <div class="card card-aside">
                    <a href="#" class="card-aside-column" style="background-image: url(/demo/photos/david-klaasen-54203-500.jpg)"></a>
                    <div class="card-body d-flex flex-column">
                        <h4><a href="#">And this isn't my nose. This is a false one.</a></h4>
                        <div class="text-muted">Look, my liege! The Knights Who Say Ni demand a sacrifice! …Are you suggesting that coconuts migr...</div>
                        <div class="d-flex align-items-center pt-5 mt-auto">
                            <div class="avatar avatar-md mr-3" style="background-image: url(/demo/faces/female/18.jpg)"></div>
                            <div>
                                <a href="./profile.html" class="text-default">Rose Bradley</a>
                                <small class="d-block text-muted">3 days ago</small>
                            </div>
                            <div class="ml-auto text-muted">
                                <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fe fe-heart mr-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-aside">
                    <a href="#" class="card-aside-column" style="background-image: url(/demo/photos/david-marcu-114194-500.jpg)"></a>
                    <div class="card-body d-flex flex-column">
                        <h4><a href="#">Well, I didn't vote for you.</a></h4>
                        <div class="text-muted">Well, we did do the nose. Why? Shut up! Will you shut up?! You don't frighten us, English pig-dog...</div>
                        <div class="d-flex align-items-center pt-5 mt-auto">
                            <div class="avatar avatar-md mr-3" style="background-image: url(/demo/faces/male/16.jpg)"></div>
                            <div>
                                <a href="./profile.html" class="text-default">Peter Richards</a>
                                <small class="d-block text-muted">3 days ago</small>
                            </div>
                            <div class="ml-auto text-muted">
                                <a href="javascript:void(0)" class="icon d-none d-md-inline-block ml-3"><i class="fe fe-heart mr-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-header">
            <h1 class="page-title">
                Classes <span class="float-right"><router-link to="/courses/new" class="btn btn-default">Create a new class</router-link></span>
            </h1>
        </div>
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

        <div class="page-header">
            <h1 class="page-title">
                Enrollments <span class="float-right"><router-link to="/courses" class="btn btn-default">Enroll for new Courses</router-link></span>
            </h1>
        </div>
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