<template>
  <div>
    <div class="more-info">
      <span class="carousel-title">{{ title }}</span>
      <router-link :to="link">view more</router-link>
    </div>

    <b-carousel-list
      class="carousel-movie"
      :data="items.slice(0,6)"
      :items-to-show="4"
      :arrow="true"
      :arrow-hover="true"
      :items-to-list="1"
      :repeat="false"
    >
      <template #item="list">
        <div class="card">
          <div class="card-image">
            <figure class="image is-5by4">
              <a v-bind:href="'/movie/' + list.id" v-on:click="goToMoviePage(movie.id)"><img :src="list.poster_url" /></a>
            </figure>
          </div>
          <div class="card-content">
            <div class="content">
              <p class="title is-6">{{ list.movie_name }}</p>
              <b-field grouped>
                <p class="control" v-if="list.rating">{{ list.rating }} /10</p>
              </b-field>
            </div>
          </div>
        </div>
      </template>
    </b-carousel-list>
  </div>
</template>
<script>
import axios from 'axios';
export default {
  name: 'CarouselMovie',
  props: ['title', 'link'],
  data() {
    return {
      items: [],
    }
  },
  created() {

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
            if(this.title=="TOP"){
              this.items = sortedMovies.sort((a, b) => b.rating - a.rating);

            }else{
              this.items = sortedMovies.sort((a, b) => b.id - a.id);

            }
          });
        })
        .catch(error => {
          console.log(error);
        });
  },
  methods: {
    goToMoviePage(id) {
      this.$router.push({ path: '/movie/' + id })
    }
  },
}
</script>



<style scoped>
.carousel-movie {
  background-color: var(--secondary-bg-color);
  padding: 1rem;
  border-radius: 0.5rem;
}
.card {
  width: 80%;
}
.carousel-title {
  font-weight: 600;
  color: var(--color-black);
}
.more-info {
  display: flex;
  font-weight: 600;
  color: var(--primary-color);
  justify-content: space-between;
}
</style>
