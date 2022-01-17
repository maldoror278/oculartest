require('./bootstrap');
window.Vue = require('vue').default;

import VueRouter from 'vue-router'
import VueAxios from 'vue-axios';
import axios from 'axios'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

 Vue.use(VueSweetalert2);
 Vue.use(VueRouter)
 Vue.use(VueAxios, axios);
 Vue.component('pagination', require('laravel-vue-pagination'));

import App from './pages/App.vue';
import Home from './pages/Home.vue';
import Login from './pages/login.vue';
import Blogs from './components/blogs/blogs.vue';
import Crear from './components/blogs/Crear.vue';
import Editar from './components/blogs/Editar.vue';

const router = new VueRouter({
  mode: 'history',
  routes: [
    {
      name: 'home',
      path: '/',
      component: Home
    },
    {
      name: 'login',
      path: '/login',
      component: Login
    },
    {
      name: 'blogs',
      path: '/blogs',
      component: Blogs
    },
    {
      name: 'nuevoBlog',
      path: '/nuevoBlog',
      component: Crear
    },
    {
      name: 'editarBlog',
      path: '/editarBlog/:id',
      component: Editar
    },
    {
      name: 'admin',
      path: '/miblog/admin',
      component: Blogs
      }
  ]
});

const app = new Vue({
    el: '#app',
    router:router,
    render : h => h(App)
});
