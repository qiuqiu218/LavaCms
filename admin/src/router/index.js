import Vue from 'vue'
import Router from 'vue-router'
import main from '../views/main'
import login from '../views/login.vue'
import member from './member'

Vue.use(Router)

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'main',
      component: main,
      children: [
        ...member
      ]
    },
    {
      path: '/login',
      name: 'login',
      component: login
    }
  ]
})
