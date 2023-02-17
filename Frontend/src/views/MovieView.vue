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
          <Categories :List="ListCategory" :movie_id="id" withAdd="true" :type="typeadd" />

          <Dropdown
            class="dropdown-item"
            :list="ListRatings"
            :category="false"
            :movie_id="id"
            :type="typerate"
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
import {mapGetters} from "vuex";
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
      typerate:"rate",
      typeadd:"addmovietocat",
      userid:1,
      ListCategory: [],
      ListRatings: [
        { id: 1, list_name: '1' },
        { id: 2, list_name: '2' },
        { id: 3, list_name: '3' },
        { id: 4, list_name: '4' },
        { id: 5, list_name: '5' },
        { id: 6, list_name: '6' },
        { id: 7, list_name: '7' },
        { id: 8, list_name: '8' },
        { id: 9, list_name: '9' },
        { id: 10, list_name: '10' },
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
  methods:{

  },

  async created() {
     const res= await axios.get('user')
     await this.$store.dispatch('user', res.data)
  axios.get('getAvgRating/'+this.id).then(res=>{
    console.log({"rating":res.data})
    this.movieScore=res.data
  })

    axios.get('movies/'+this.id )
        .then(response => {
         var movie= response.data
          this.movieTitle=movie.movie_name
          this.moviePosterUrl=movie.poster_url
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
    console.log(this.user.id)
    axios.get('userlistsOfUser/'+this.user.id).then(response=>{
      this.ListCategory=response.data


      console.log(response.data)
    }).catch(error=>{
      console.log(error)
    })

  },
  computed: {
      id() {
      return this.$route.params.id
    },
    ...mapGetters(['user'])


  }
  ,
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
