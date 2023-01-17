<template>
  <Mainbody>
    <div class="movie-main">
      <Aside :img-link="moviePosterUrl">
        <div class="movie-info-aside div-comp-white">
          <div class="aside-title title">Information</div>
          <span
            >Year: <span class="info">{{ movieYear }}</span>
          </span>
          <span
            >Duration: <span class="info">{{ movieDuration }}</span></span
          >
          <span>Genre: <span class="info">{{movieGenre}}</span></span>
        </div>
      </Aside>
      <section class="div-comp movie-details">
        <div class="div-comp-white movie-comp">
          <div class="title m-title">{{movieTitle}}</div>
          <div class="title score">Score: {{ movieScore }} | 10</div>
        </div>
        <div class="dropdown-group">
          <Categories :List="ListCategory" />

          <Dropdown
            class="dropdown-item"
            :list="ListRatings"
            :category="false"
            placeholder="Select a Rating"
          ></Dropdown>
        </div>
        <div class="div-comp-white synopsis">
          <div class="title synopsis-title">Synopsis:</div>
          <div class="synopsis-body">
            {{ movieSynopsis }}
          </div>
        </div>
      </section>
    </div>
  </Mainbody>
</template>
<script>
import Mainbody from '@/components/Mainbody.vue'
import Dropdown from '@/components/Dropdown.vue'
import Categories from '@/components/Categories.vue'
import Aside from '@/components/Aside.vue'
import axios from "axios";

export default {
  name: 'MovieView',
  components: {
    Mainbody,
    Dropdown,
    Categories,
    Aside,
  },
  data() {
    return {
      ListCategory: [],
      ListRatings: [
        { id: 1, listName: '1' },
        { id: 2, listName: '2' },
        { id: 3, listName: '3' },
        { id: 4, listName: '4' },
        { id: 5, listName: '5' },
        { id: 6, listName: '6' },
        { id: 7, listName: '7' },
        { id: 8, listName: '8' },
        { id: 9, listName: '9' },
        { id: 10, listName: '10' },
      ],
      movieTitle:'',
      movieGenreID:'',
      movieGenre:'',
      moviePosterUrl:'',
      movieSynopsis:'',
      movieDuration: '1h 30min',
      movieScore: null,
      movieYear: 2000,
    }
  },
  computed: {
    id() {
      return this.$route.params.id
    },
  },
  created() {
    axios.get('movies/'+this.id )
        .then(response => {
         var movie= response.data
          this.movieTitle=movie.movie_name
          this.moviePosterUrl=movie.poster_url
          this.movieScore=movie.rating
          this.movieSynopsis=movie.synopsis



          axios.get('genres/'+movie.genre_id )
              .then(response=>{
                console.log(response.data)
                this.movieGenre=response.data.genre
              }).catch(error => {
            console.log(error)
          });

        })
        .catch(error => {
          console.log(error)
        });

  },
}
</script>
<style scoped>
.movie-main {
  margin: 1.5rem 1rem;
  display: flex;
  justify-content: space-around;
}
.movie-details {
  width: 70%;
  display: flex;
  flex-direction: column;
  padding: 1rem;
}
.movie-info-aside {
  margin: 1rem 2rem;
  padding: 0.7rem 0.7rem 0.7rem 0.7rem;
  min-height: 15rem;
  display: flex;
  flex-direction: column;
}
.movie-info-aside > span {
  padding-top: 0.5em;
  font-weight: 400px;
  color: var(--color-black);
}
.info {
  color: var(--color-grey);
}
.movie-comp {
  padding: 2rem;
  margin: 1rem 0;
}
.score {
  border: none;
  font-size: 1.5em;
}
.m-title {
  font-size: 2.5em;
}
.dropdown-group {
  display: flex;
  justify-content: flex-start;
}
.dropdown-item {
  margin: 0 1rem;
}
/* .add-category {
  display: flex;
} */
/* .add-category-item {
  margin: 0;
  padding-inline: 5px;
} */
.synopsis {
  margin: 1rem 0;
  padding: 2rem;
  height: fit-content;
}
.synopsis-body {
  font-size: 1.2em;
  color: var(--color-black);
}
</style>
