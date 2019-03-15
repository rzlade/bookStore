import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import Buku from '@/components/Buku'
import FormBuku from '@/components/FormBuku'

import BootstrapVue from 'bootstrap-vue'

Vue.use(Router)
Vue.use(BootstrapVue)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/buku',
      name: 'Buku',
      component: Buku
    },
    {
      path: '/add',
      name: 'FormBuku',
      component: FormBuku
    },
    {
      path: '/buku/:id',
      name: 'FormEdit',
      component: FormBuku
    }
  ]
})
