import Vue from 'vue'
import Router from 'vue-router'
// import auth from '../auth'
import DashView from './components/layout/navbar'
import Dashboard from './components/pages/home'
import sms from './components/views/sms.vue'
import login from './components/views/login.vue'
import register from './components/views/register.vue'
import user from './components/views/user.vue'
import secret from './components/views/SecretQuote.vue'


Vue.use(Router)
export default new Router({
    mode: 'history',
  routes: [
    {
      path: '/login',
      component: login
    },
    {
      path: '/register',
      component: register
    },
    {
      path: '/',
      component: DashView,
      children: [
        {
          path: '/dashboard',
          alias: '',
          component: Dashboard,
          name: 'home',
        }, {
          path: 'sms',
          component: sms,
          name: 'sms'
        }, {
          path: 'user',
          component: user,
          name: 'user'
        }, {
          path: 'secret',
          component: secret,
          name: 'secret'
        }
    ]}
  ]
})
