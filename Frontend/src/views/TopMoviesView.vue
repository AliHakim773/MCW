<template>
  <MainBody>

    <main class="top-main">
      <TopMovieTable :movies="MoviesList" />
      <Pagination />
    </main>
  </MainBody>
</template>
<script>
import MainBody from '@/components/Mainbody.vue'
import TopMovieTable from '@/components/Top Movies/TopMovieTable.vue'
import axios from "axios";

export default {
  name: 'TopMoviesView',
  components: {
    MainBody,
    TopMovieTable,
  },
  data() {
    return {
      MoviesList: [ ],
    }
  },
  async created(){

    axios.get('movies')
        .then(response => {
          const movies = response.data;
          const promises = movies.map(movie => {
            return axios.get('getAvgRating/' + movie.id)
                .then(res => {
                  movie.rating = res.data;
                  return movie;
                });
          });

          Promise.all(promises).then(sortedMovies => {
            this.MoviesList = sortedMovies.sort((a, b) => b.rating - a.rating);
          });
        })
        .catch(error => {
          console.log(error);
        });
  }
}
</script>
<style scoped>
.top-movies-nav {
  margin: 3rem;
  border-bottom: 1px solid var(--color-black);
}
.top-nav-link {
  margin-left: 1em;
}
.top-main {
  margin: 3rem;
}
</style>
