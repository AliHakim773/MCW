<template>
  <div class="main-body">
    <nav class="site-nav-container">
      <div class="site-nav">
        <router-link class="site-nav-link" to="/">Home</router-link>
<!--        <router-link class="site-nav-link" to="/login">login</router-link>-->
<!--        <router-link class="site-nav-link" to="/register">Register</router-link>-->
<!--        <router-link class="site-nav-link" to="/Movie">Movie</router-link>-->
<!--        <router-link class="site-nav-link" to="/Profile">Profile</router-link>-->
        <router-link class="site-nav-link" to="/list">List</router-link>
        <router-link class="site-nav-link" to="/forums">Forums</router-link>
        <router-link class="site-nav-link" to="/topmovies">Top Movies</router-link
        >
      </div>
      <div class="search">
        <form>
          <b-field label="Find a user">
            <b-autocomplete
                :data="data"
                placeholder="e.g. AliMr"
                field="title"
                :loading="isFetching"
                @typing="getAsyncData"
                @select="option => onSelect(option)">

              <template slot-scope="props">
                <div class="media">
                  <div class="media-left">
                    <img width="32" src="../../public/Lissa.png">
                  </div>
                  <div class="media-content">
                    {{ props.option.name }}
                    <br>

                  </div>
                </div>
              </template>
            </b-autocomplete>
          </b-field>
        </form>
      </div>
      <div class="search">
        <form>
          <b-field label="Find a movie">
            <b-autocomplete
                :data="MovieData"
                placeholder="e.g. Avatar"
                field="title"
                :loading="isFetchingM"
                @typing="getAsyncMovies"
                @select="option => onSelect(option)">

              <template slot-scope="props">
                <div class="media">
                  <div class="media-left">
                    <img width="32" :src="props.option.poster_url">
                  </div>
                  <div class="media-content">
                    {{ props.option.movie_name }}
                    <br>

                  </div>
                </div>
              </template>
            </b-autocomplete>
          </b-field>
        </form>
      </div>
    </nav>
    <slot></slot>
  </div>
</template>
<script>
import {debounce} from "lodash";
import axios from "axios";

export default {
  name: 'MainBody',
  components: {},
  data() {
    return {
      MovieData:[],
      isFetchingM: false,

      data: [],
      selected: null,
      isFetching: false,
      moviesList: '',
      movie: {
        title: 'yohoo',
        rate: 3,
      },
    }
  },
  methods: {
    onSelect(option) {
      console.log(option.id);
      this.$router.push({ path: '/profile/' + option.id })

    },
    test(id) {
      console.log(id)
    },
    getAsyncData: debounce(function (name) {
      if (!name.length) {
        this.data = []
        return
      }

      this.isFetching = true
      axios.get(`get_users_by_letter/${name}`)
          .then(response => {
            this.data = response.data
            console.log(response.data)
          })
          .catch((error) => {
            this.data = []
            console.log(error)
          })
          .finally(() => {
            this.isFetching = false
          })
    }, 500) ,
    getAsyncMovies: debounce(function (name) {
      if (!name.length) {
        this.data = []
        return
      }

      this.isFetchingM = true
      axios.get(`get_movies_by_letter/${name}`)
          .then(response => {
            this.MovieData = response.data
            console.log(response.data)
          })
          .catch((error) => {
            this.MovieData = []
            console.log(error)
          })
          .finally(() => {
            this.isFetchingM = false
          })
    }, 500)



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
