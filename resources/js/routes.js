/**
 * --------------------
 * routes.js
 * --------------------
 * Contains all of the routes for the application
 */


/**
 * Imports Vue and VueRouter to extend with the routes
 */
import Vue from 'vue'
import VueRouter from 'vue-router'

/**
 * Extends vue to Vue Router
 */
Vue.use(VueRouter);

/**
 * Makes a new VueRouter that we will use to run all of the route for the app
 */
export default new VueRouter({
    routes: [
        {
            path: '/',
            name: 'home',
            component: () => import("./pages/Home.vue")
        },
        {
            path: '/cafes',
            name: 'cafes',
            component: () => import("./pages/Cafes.vue")
        },
        {
            path: "/cafes/new",
            name: 'newcafe',
            component: () => import("./pages/NewCafe.vue")
        },
        {
            path: '/cafes/:id',
            name: 'cafe',
            component: () => import('./pages/Cafe.vue')
        }
    ]
});