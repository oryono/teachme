import Vue from 'vue'
import Router from 'vue-router'
import LoginComponent from '../components/LoginComponent'
import RegisterComponent from '../components/RegisterComponent'
import HomeComponent from '../components/HomeComponent'
import RootComponent from '../components/RootComponent'
import NewCourseComponent from '../components/NewCourseComponent'
import CoursesComponent from '../components/CoursesComponent'

Vue.use(Router)

export default new Router({
    routes: [
        {
            path: '/',
            name: 'root',
            component: RootComponent,

        },
        {
            path: '/login',
            name: 'login',
            component: LoginComponent

        },

        {
            path: '/register',
            name: 'register',
            component: RegisterComponent

        },

        {
            path: '/home',
            name: 'home',
            component: HomeComponent,
            meta: {
                requiresAuth: true
            }

        },

        {
            path: '/courses/new',
            name: 'new-courses',
            component: NewCourseComponent

        },

        {
            path: '/courses',
            name: 'courses',
            component: CoursesComponent,
            meta: {
                requiresAuth: true
            }

        },
    ]
})