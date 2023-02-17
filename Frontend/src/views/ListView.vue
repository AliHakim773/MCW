<template>
  <div>
    <header class="list-header">
      <h1>{{ user.name }}
      </h1>
      's List
    </header>
    <div class="div-comp-white list">
      <header>
        <div class="category">
          <div class="current-list-title">{{ CurrentList.list_name }} <button v-if="CurrentList.list_name!=='All'" @click="deleteCategory(CurrentList.id)"> delete</button></div>
          <Categories :list="ListCategory" :withAdd="false" :type="typeselect"
                      @categorySelected="handleCategorySelected"/>
        </div>
        <div class="list-nav">
          <div class="list-title" style="width: 5%">#</div>
          <div class="list-title" style="width: 10%">Image</div>
          <div class="list-title" style="width: 50%">Title</div>
          <div class="list-title" style="width: 10%">score</div>
          <div class="list-title" style="width: 10%"></div>
        </div>
        <div v-if="movies.length !== 0">
          <ListItem
              v-for="m in movies"
              :number="movies.indexOf(m)"
              :score="m.rating"
              :title="m.movie_name"
              :key="m.id"
              :movie_id="m.id"
              :img="m.poster_url"
              :selectedListId="selecetedListId"
              @categorySelected="handleCategorySelected"
              class="list-items"
          />
        </div>
        <div v-else class="empth-list">Your List Is empty</div>
      </header>
    </div>
  </div>
</template>
<script>
import Categories from '@/components/Categories.vue'
import ListItem from '@/components/ListItem.vue'
import axios from "axios";
import {mapGetters} from "vuex";

export default {
  name: 'ListView',
  components: {
    Categories,
    ListItem,
  },
  data() {
    return {
      typeselect: 'select',
      selecetedListId: null,
      Name: 'BlackSea',

      ListCategory: [],
      CurrentList: '',
      movies: [],
      allListId:null,
    }
  },
  methods: {
   async deleteCategory(id){
    await  axios.delete('userLists/'+id).then(response => {
        console.log(response)
      }).catch(error => {
        console.log(error)
      })
     await this.handleCategorySelected(this.allListId)
      await this.loadUserLists()
    },
   async loadUserLists(){
      const res2 = await axios.get('userlistsOfUser/' + this.user.id)
      this.ListCategory = res2.data
   },

    async handleCategorySelected(id) {
      this.selecetedListId = id;
      const res = await axios.get('moviesInList/' + id)
      const movies = res.data.flatMap(item => item.movies);
      const promises = movies.map(movie => {
        return axios.get('getAvgRating/' + movie.id)
            .then(res => {
              movie.rating = res.data;
              return movie;
            });
      });
      Promise.all(promises).then(sortedMovies => {
        this.movies = sortedMovies.sort((a, b) => b.rating - a.rating);
      });
      const res2 = await axios.get('userLists/' + id)
      this.CurrentList = res2.data
    }
  },
  async created() {

    const alllist = await axios.get('get_allList/'+this.user.id)
    await this.handleCategorySelected(alllist.data.id)
    this.allListId=alllist.data.id
    const res = await axios.get('user')
    await this.$store.dispatch('user', res.data)
   await this.loadUserLists()

    // axios.get('userlistsOfUser/'+this.user.id).then(response=>{
    //   this.ListCategory=response.data
    //
    //
    //   console.log(response.data)
    // }).catch(error=>{
    //   console.log(error)
    // })

  },
  computed: {
    ...mapGetters(['user'])
  },
  mounted() {
  }

}
</script>
<style scoped>
.list-header {
  height: 10rem;
  display: flex;
  align-items: flex-start;
  justify-content: center;
  padding: 2rem;
  font-size: 2em;
  font-weight: 600;
}

.list {
  margin: 1rem 7rem 7rem 7rem;
  padding: 0.4rem;
}

.list header {
  display: flex;
  flex-direction: column;
}

.category {
  display: flex;
  justify-content: space-between;
}

.current-list-title {
  padding: 0.7rem;
  font-size: 1.5em;
  font-weight: 400;
  color: var(--color-black);
}

.list-nav {
  display: flex;
}

.list-items:not(:last-child) {
  border-bottom: 1px solid var(--color-grey);
}

.list-title {
  text-align: center;
  padding-bottom: 0.4rem;
  font-size: 1.3em;
  font-weight: 400;
  color: var(--color-black);
  border-bottom: 1px solid var(--color-grey);
}

.list-title:not(:first-child) {
  border-left: 1px solid var(--color-grey);
}

.empth-list {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 10rem;
  font-size: 2.4rem;
  font-weight: 500;
  opacity: 0.6;
}
</style>
