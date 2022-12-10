<template lang="">
  <div>
    <div class="more-info">
      <span class="carousel-title">{{ title }}</span>
      <router-link :to="link">view more</router-link>
    </div>

    <b-carousel-list
      class="carousel-movie"
      :data="items"
      :items-to-show="4"
      :arrow="true"
      :arrow-hover="true"
      :items-to-list="1"
      :repeat="true"
    >
      <template #item="list">
        <div class="card">
          <div class="card-image">
            <figure class="image is-5by4">
              <a @click="info(list.index)"><img :src="list.image" /></a>
            </figure>
          </div>
          <div class="card-content">
            <div class="content">
              <p class="title is-6">{{ list.title }}</p>
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
export default {
  name: 'CarouselMovie',
  props: ['title', 'link'],
  data() {
    return {
      items: [
        {
          title: 'Slide 1',
          image: 'https://buefy.org/static/img/placeholder-1280x960.png',
          rating: 4.4,
        },
        {
          title: 'Slide 2',
          image: 'https://buefy.org/static/img/placeholder-1280x960.png',
          rating: 3.5,
        },
        {
          title: 'Slide 3',
          image: 'https://buefy.org/static/img/placeholder-1280x960.png',
          rating: 5,
        },
        {
          title: 'Slide 4',
          image: 'https://buefy.org/static/img/placeholder-1280x960.png',
          rating: 3,
        },
        {
          title: 'Slide 5',
          image: 'https://buefy.org/static/img/placeholder-1280x960.png',
          rating: 5,
        },
        {
          title: 'Slide 6',
          image: 'https://buefy.org/static/img/placeholder-1280x960.png',
          rating: 4,
        },
        {
          title: 'Slide 7',
          image: 'https://buefy.org/static/img/placeholder-1280x960.png',
          rating: 2.7,
        },
        {
          title: 'Slide 8',
          image: 'https://buefy.org/static/img/placeholder-1280x960.png',
          rating: 1.5,
        },
      ],
    }
  },
  methods: {
    info() {
      console.log('hi')
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
