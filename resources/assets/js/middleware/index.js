import redirectIfAuthenticated from './redirectIfAuthenticated'


export default function middleware (router) {
    redirectIfAuthenticated(router)
}