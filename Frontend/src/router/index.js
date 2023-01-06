import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: () =>
      import(/* webpackChunkName: "about" */ '../views/HomeView.vue'),
  },
  {
    path: '/login',
    name: 'login',
    component: () =>
      import(/* webpackChunkName: "about" */ '../views/LoginView.vue'),
  },
  {
    path: '/register',
    name: 'register',
    component: () =>
      import(/* webpackChunkName: "about" */ '../views/RegisterView.vue'),
  },
  {
    path: '/movie',
    name: 'movie',
    component: () =>
      import(/* webpackChunkName: "about" */ '../views/MovieView.vue'),
  },
  {
    path: '/profile',
    name: 'profile',
    component: () =>
      import(/* webpackChunkName: "about" */ '../views/ProfileView.vue'),
  },
  {
    path: '/friends',
    name: 'friends',
    component: () =>
      import(/* webpackChunkName: "about" */ '../views/FriendsView.vue'),
  },
  {
    path: '/list',
    name: 'list',
    component: () =>
      import(/* webpackChunkName: "about" */ '../views/ListView.vue'),
  },
  {
    path: '/topmovies',
    name: 'topmoves',
    component: () =>
      import(/* webpackChunkName: "about" */ '../views/TopMoviesView.vue'),
  },
  {
    path: '/forums',
    name: 'forums',
    component: () =>
      import(/* webpackChunkName: "about" */ '../views/ForumsView.vue'),
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
})

export default router
