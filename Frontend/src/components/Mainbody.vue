<template>
  <div class="main-body">
    <nav class="site-nav-container">
      <div class="site-nav">
        <router-link class="site-nav-link" to="/">Home</router-link>
        <router-link class="site-nav-link" to="/login">login</router-link>
        <router-link class="site-nav-link" to="/register">Register</router-link>
        <router-link class="site-nav-link" to="/Movie">Movie</router-link>
        <router-link class="site-nav-link" to="/Profile">Profile</router-link>
        <router-link class="site-nav-link" to="/list">List</router-link>
        <router-link class="site-nav-link" to="/forums">Forums</router-link>
        <router-link class="site-nav-link" to="/topmovies"
          >Top Movies</router-link
        >
      </div>
      <div class="search">
        <form>
          <input type="text" placeholder="Search" />
          <div class="search-result">
            <ul>
              <li @click="test">
                <ListItemSmall :title="movie.title" :status="movie.rate" />
              </li>
              <li>
                <ListItemSmall :title="movie.title" :status="movie.rate" />
              </li>
              <li>
                <ListItemSmall :title="movie.title" :status="movie.rate" />
              </li>
            </ul>
          </div>
        </form>
      </div>
    </nav>
    <slot></slot>
  </div>
</template>
<script>
import ListItemSmall from './ListItemSmall.vue'
export default {
  name: 'MainBody',
  components: {
    ListItemSmall,
  },
  data() {
    return {
      moviesList: '',
      movie: {
        title: 'yohoo',
        rate: 3,
      },
    }
  },
  methods: {
    test() {
      console.log('test')
    },
  },
}
</script>
<style scoped>
.main-body {
  background-color: var(--color-white);
  width: 90%;
  margin: 3rem auto;
  border-radius: 1rem;
  padding-bottom: 5rem;
  /* min-height: 700px; */
}
.site-nav {
  display: flex;
  justify-content: center;
  align-items: center;
}
.site-nav-container {
  background-color: var(--primary-color);
  border-top-left-radius: 1rem;
  border-top-right-radius: 1rem;
  padding: 1em 2rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.site-nav-link {
  color: var(--color-white);
  font-weight: 500;
  text-decoration: none;
  font-size: 1.2em;
  margin: 0 0.5em;
}
.search input {
  border-radius: 1rem;
  padding: 3px 10px;
  margin-right: 2rem;
  width: 300px;
  border: none;
  position: relative;
}
.search input:focus + .search-result,
.search-result:hover {
  display: block;
}
.search-result {
  display: none;
  position: absolute;
  background-color: var(--color-white);
  width: 300px;
  margin-top: 0.1rem;
  border-radius: 0.3rem;
  box-shadow: 0 10px 15px 5px rgb(0 0 0 / 20%);
}
.search-result li:not(:last-child):not(:first-child) {
  padding-bottom: 0.3rem;
  padding-top: 0.3rem;
}
.search-result li:hover {
  background-color: rgb(0 0 0 / 20%);
}
</style>
