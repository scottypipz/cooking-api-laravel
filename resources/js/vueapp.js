import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from './routes/index.route'

Vue.use(VueRouter)

import App from './components/App.vue'

const router = new VueRouter(routes)
const app = new Vue({
    el: '#app',
    components: { App },
    router,
});