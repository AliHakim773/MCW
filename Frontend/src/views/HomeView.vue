<template>
  <Mainbody>
    <div class="home-wrapper">

      <main class="main-home">

        <Carousel class="carousel" :title="title" :link="link" />
        <Carousel class="carousel" :title="title2" :link="link" />
        <TopForums />
      </main>
      <aside class="aside-home div-comp">
        <div class="aside-comp">
          <div class="title">My Statistics</div>
          <div class="aside-info">
            <span >My List Entries</span>
            <span>{{listEntries}}</span>
            |
            <span>My Followers</span>
            <span>{{listEntries}}</span>
|
            <span>My Followings</span>
            <span>{{listEntries}}</span>
          </div>
        </div>
        <div class="aside-comp">
          <div class="title">Recent Updates</div>
          <div class="aside-list-items">
            <ListItemSmall
              v-for="item in recentUpdates"
              :key="item.id"
              class="listItemSmall"
              :title="item.movie_name"
              :status="item.status"
              :date="formatDate(item.created_at)"
              :img-link="item.poster_url"
            ></ListItemSmall>
          </div>
        </div>
        <div class="aside-comp">
          <div class="title">Reviews</div>
          <div class="aside-list-items">
            <ReviewSmall
              v-for="item in recentReviews"
              :key="item.id"
              class="listItemSmall"
              :title="item.movie.movie_name"
              :status="item.user.name"
              :rating="item.rating"
              :content="item.review"
              :img-link="item.movie.poster_url"
            ></ReviewSmall>
          </div>
        </div>
      </aside>
    </div>
  </Mainbody>
</template>
<script>
import TopForums from '@/components/TopForums.vue'
import Carousel from '@/components/Carousel.vue'
import ListItemSmall from '@/components/ListItemSmall.vue'
import ReviewSmall from '@/components/ReviewSmall.vue'
import Mainbody from '@/components/Mainbody.vue'
import axios from "axios";
import {mapGetters} from "vuex";
// import axios from 'axios'
export default {
  name: 'HomeView',
  components: {
    TopForums,
    Carousel,
    ListItemSmall,
    ReviewSmall,
    Mainbody,
  },
  data() {
    return {
      title: 'TOP',
      title2: 'RECENT',
      link: '/register',
      recentUpdates: [],
      recentReviews: [],
      listEntries:null,
    }
  },
  computed:{
    ...mapGetters(['user'])
  },
  async created() {
    const resuser= await axios.get('user')
    await this.$store.dispatch('user', resuser.data)
    const alllist = await axios.get('get_allList/'+this.user.id)
    const allId=alllist.data.id

    const numbres = await axios.get('getNumberOfMoviesInList/'+allId)
    this.listEntries=numbres.data


    const res = await axios.get('moviesInList/' + allId)
    this.recentUpdates = res.data.flatMap(item => item.movies).sort((a, b) => b.id - a.id)
        .slice(0, 3);
    console.log(res.data)

    const reviewres = await axios.get('rates/')

    this.recentReviews= reviewres.data.sort((a, b) => b.id - a.id).slice(0, 4);
  },
  methods:{
    formatDate(timestamp) {
      const date = new Date(timestamp);
      return date.toLocaleString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: 'numeric',
        minute: 'numeric',
        second: 'numeric',
        hour12: true,
      });
    },
  }

}
</script>
<style scoped>
.home-wrapper {
  padding: 1em;
  display: flex;
  justify-content: space-between;
}
.main-home {
  width: 74%;
}
.aside-home {
  width: 24%;
  padding: 1rem;
  margin-top: 1.4rem;
}
.carousel:last-child {
  margin-top: 3rem;
}
.aside-comp {
  padding: 0.9rem;
  border-radius: 0.3rem;
  background-color: var(--color-white);
  margin-bottom: 1rem;
}

.aside-info {
  display: flex;
  padding: 0.9rem 0;
  justify-content: space-between;
  color: var(--color-grey);
  font-weight: 400;
}
.listItemSmall {
  margin: 0.4rem 0;
}
</style>
