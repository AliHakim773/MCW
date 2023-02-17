import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: () =>
      import(/* webpackChunkName: "home" */ '../views/HomeView.vue'),
  },
  {
    path: '/login',
    name: 'login',
    component: () =>
      import(/* webpackChunkName: "login" */ '../views/LoginView.vue'),
  },
  {
    path: '/register',
    name: 'register',
    component: () =>
      import(/* webpackChunkName: "register" */ '../views/RegisterView.vue'),
  },
  {
    path: '/movie',
    name: 'movie',
    component: () =>
      import(/* webpackChunkName: "movie" */ '../views/MovieView.vue'),
  },
  {
    path: '/profile/:id',
    name: 'profile',
    component: () =>
      import(/* webpackChunkName: "profile" */ '../views/ProfileView.vue'),
  },

  {
    path: '/currentprofile',
    name: 'currentprofile',
    component: () =>
        import(/* webpackChunkName: "profile" */ '../views/CurrentProfileView.vue'),
  },
  {
    path: '/friends',
    name: 'friends',
    component: () =>
      import(/* webpackChunkName: "friends" */ '../views/FriendsView.vue'),
  },
  {
    path: '/list',
    name: 'list',
    component: () =>
      import(/* webpackChunkName: "list" */ '../views/ListView.vue'),
  },
  {
    path: '/topmovies',
    name: 'topmovies',
    component: () =>
      import(/* webpackChunkName: "topmovies" */ '../views/TopMoviesView.vue'),
  },
  {
    path: '/forums',
    name: 'forums',
    component: () =>
      import(/* webpackChunkName: "forums" */ '../views/ForumsView.vue'),
  },
  {
    path: '/forum/:id/:username/',
    name: 'forum',
    component: () =>
      import(/* webpackChunkName: "forum" */ '../views/ForumView.vue'),
  },
  {
    path: '/editprofile',
    name: 'editprofile',
    component: () =>
      import(
        /* webpackChunkName: "editprofile" */ '../views/EditProfileView.vue'
      ),
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
})

export default router
