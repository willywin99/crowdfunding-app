import Vue from 'vue'
import Router from 'vue-router'


Vue.use(Router)



// DEFINE ROUTE
const router = new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            alias: '/home',
            component: () => import( /* webpackChunkName: "categories" */ './views/Home.vue')
        },
        {
            path: '/donations',
            name: 'donations',
            component: () => import( /* webpackChunkName: "categories" */ './views/Donations.vue')
        },
        {
            path: '/blogs',
            name: 'blogs',
            component: () => import( /* webpackChunkName: "categories" */ './views/Blogs.vue')
        },
        {
            path: '/campaigns',
            name: 'campaigns',
            component: () => import( /* webpackChunkName: "categories" */ './views/Campaigns.vue')
        },
        {
            path: '/campaign/:id',
            name: 'campaign',
            component: () => import( /* webpackChunkName: "categories" */ './views/Campaign.vue')
        },
        {
            path: '*',
            redirect: '/'
        },
    ],

});



export default router

