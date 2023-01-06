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
              <a @click="info(list.id)"><img :src="list.poster_url" /></a>
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
    axios.get('http://127.0.0.1:8000/api/movies')
        .then(response => {
          if(this.title=="TOP"){
            this.items = response.data.sort((a, b) => b.rating - a.rating);
          }else{
            this.items = response.data.sort((a, b) => b.created_at - a.created_at);
          }

          console.log(this.items)
        })
        .catch(error => {
          console.log(error)
        });
  },
  methods: {
    info() {
      this.$router.push('/movie')
      // this.$router.push('/movie/'+id)
    },
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
