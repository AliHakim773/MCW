<template>
  <div>
    <header class="list-header">
      <router-link to="/profile">{{ Name }}
      </router-link
      >
      's List
    </header>
    <div class="div-comp-white list">
      <header>
        <div class="category">
          <div class="current-list-title">{{ CurrentList }}</div>
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
      CurrentList: 'Current List Name',
      movies: [],
    }
  },
  methods: {
    async handleCategorySelected(id) {
      this.selecetedListId = id;
      const res = await axios.get('moviesInList/' + id)
      const movies = res.data.flatMap(item => item.movies);
      this.movies = movies
      const res2 = await axios.get('userLists/' + id)
      this.CurrentList = res2.data.list_name
    }
  },
  async created() {
    //add this when find the all list of every user
    // const res= await axios.get('moviesInList/'+id)
    // console.log(res.data)
    // const movies = res.data.flatMap(item => item.movies);
    // this.movies=movies
    // console.log(movies)
    // const res2= await axios.get('userLists/'+id)
    // this.CurrentList=res2.data.list_name
    //
    const res = await axios.get('user')
    await this.$store.dispatch('user', res.data)

    const res2 = await axios.get('userlistsOfUser/' + this.user.id)
    this.ListCategory = res2.data
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
    this.handleCategorySelected()
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
