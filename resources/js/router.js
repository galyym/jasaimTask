import vueRouter from 'vue-router';
import Vue from 'vue';

Vue.use(vueRouter);

import Index from "./components/Index";
import Worker from "./views/Worker";
import Login from "./components/User/Login";
import Register from "./components/User/Register";

const route = new vueRouter({
    mode: 'history',

    routes: [
        {
            path: '/',
            name: 'home',
            component: Worker
        },
        {
            path: '/worker',
            name: 'worker',
            component: Worker
        },
        {
            path: '/login',
            name: 'user.login',
            component: Login
        },
        {
            path: '/register',
            name: 'user.register',
            component: Register
        },
        {
            path: '*',
            name: '404',
            component: Index
        }
    ]
})


route.beforeEach((to, from, next) => {
    const accessToken = localStorage.getItem('token')

    if (!accessToken){
        if (to.name === 'user.login' || to.name === 'user.register'){
            return next()
        }else{
            return next({
                name: 'user.login'
            })
        }
    }

    if (to.name === 'user.login' || to.name === 'user.register' && accessToken){
        return next({
            name: 'user.blog'
        })
    }

    next()
})

export default route
