import Dashboard from '../components/partials/Dashboard.vue'
import Recipe from '../components/partials/recipe/Recipe.vue'

const router = {
    mode: 'history',
    routes: [
        {
            path: '/',
            redirect: '/dashboard'
        },
        {
            path: '/dashboard',
            name: 'Dashboard',
            component: Dashboard,
            props: { title: "Dashboard" }
        },
        {
            path: '/recipe',
            name: 'Recipe',
            component: Recipe,
            props: { title: "Recipe" }
        }
    ]
}

export default router