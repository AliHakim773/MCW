<template>
  <MainBody>
    <nav class="top-movies-nav">
      <router-link class="top-nav-link" to="/">Top score</router-link>
    </nav>
    <main class="top-main">
      <TopMovieTable :movies="MoviesList" />
      <Pagination />
    </main>
  </MainBody>
</template>
<script>
import MainBody from '@/components/Mainbody.vue'
import TopMovieTable from '@/components/Top Movies/TopMovieTable.vue'

export default {
  name: 'TopMoviesView',
  components: {
    MainBody,
    TopMovieTable,
  },
  data() {
    return {
      MoviesList: [
        {
          name: 'Movie',
          userScore: '8',
          avgScore: '8',
          imgSrc: '',
        },
        {
          name: 'Movie',
          userScore: '8',
          avgScore: '8',
          imgSrc: '',
        },
        {
          name: 'Movie',
          userScore: '8',
          avgScore: '8',
          imgSrc: '',
        },
        {
          name: 'Movie',
          userScore: '8',
          avgScore: '8',
          imgSrc: '',
        },
        {
          name: 'Movie',
          userScore: '8',
          avgScore: '8',
          imgSrc: '',
        },
      ],
    }
  },
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
