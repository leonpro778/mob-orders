import Vue from 'vue'
import VueRouter from 'vue-router'
import LoginForm from '@/components/LoginForm'
import LastOrders from '@/components/LastOrders';
import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import WelcomePage from "@/components/WelcomePage";
import { isAuth } from '@/mixin/Auth'

Vue.use(VueRouter)
Vue.use(BootstrapVue)
Vue.use(BootstrapVueIcons)

Vue.config.productionTip = false

const routes = [
  {
    path: '/login',
    component: LoginForm,
    name: 'Login',
    meta: {
      requiresAuth: false
    }
  },
  {
    path: '',
    component: LoginForm,
    name: 'EmptyPage',
    meta: {
      requiresAuth: false
    }
  },
  {
    path: '/welcomePage',
    component: WelcomePage,
    name: 'WelcomePage',
    meta: {
      requiresAuth: true
    }
  },
  {
    path: '/lastOrders',
    component: LastOrders,
    name: 'LastOrders',
    meta: {
      requiresAuth: true
    }
  }
]

const router = new VueRouter({
  // mode: 'history',
  routes
})

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    isAuth().then(response => {
      if (response.data.status) { next() }
      else { next({ name: 'Login' }) }
    })
  } else {
    if ((to.name === 'Login') || (to.name === 'EmptyPage')) {
      isAuth().then(response => {
        if (!response.data.status) { next() }
        else { next({ name: 'WelcomePage' }) }
      })
    } else { next() }
  }
})

new Vue({
  router
}).$mount('#app')
