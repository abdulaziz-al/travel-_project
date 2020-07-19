/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
Vue.use(VueRouter)

window.Vue = require('vue');
import Vue from 'vue'
import VueRouter from 'vue-router'

import item from'./components/Item.vue'
import routes from'./routes.js'

import Swal from 'sweetalert2'
window.Swal=Swal
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
window.Toast=Toast
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


  const router = new VueRouter({
    mode:'history',

    routes // short for `routes: routes`
  })

const app = new Vue({
    el: '#app',
    router,
    components:{
        item
    }
});
