<template>
  <Mainbody>
    <div class="home-wrapper">
      <main class="main-home">
        <Carousel class="carousel" :title="title" :link="link" />
        <Carousel class="carousel" :title="title" :link="link" />
      </main>
      <aside class="aside-home div-comp">
        <div class="aside-comp">
          <div class="title">My Statistics</div>
          <div class="aside-info">
            <span>My List Entries</span>
            <span>700</span>
          </div>
        </div>
        <div class="aside-comp">
          <div class="title">Recent Updates</div>
          <div class="aside-list-items">
            <ListItemSmall
              v-for="item in recentUpdates"
              :key="item.id"
              class="listItemSmall"
              :title="item.title"
              :status="item.status"
              :date="item.date"
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
              :title="item.title"
              :status="item.status"
              :rating="item.rating"
              :content="item.content"
            ></ReviewSmall>
          </div>
        </div>
      </aside>
    </div>
  </Mainbody>
</template>
<script>
import Carousel from '@/components/Carousel.vue'
import ListItemSmall from '@/components/ListItemSmall.vue'
import ReviewSmall from '@/components/ReviewSmall.vue'
import Mainbody from '@/components/Mainbody.vue'

export default {
  name: 'HomeView',
  components: {
    Carousel,
    ListItemSmall,
    ReviewSmall,
    Mainbody,
  },
  data() {
    return {
      title: 'Title',
      link: '/register',
      recentUpdates: [
        {
          id: 1,
          title: 'The gardian of the Galaxy',
          status: 'status',
          date: 'sometime',
        },
        { id: 2, title: 'Title', status: 'status', date: 'sometime' },
        { id: 3, title: 'Title', status: 'status', date: 'sometime' },
        { id: 4, title: 'Title', status: 'status', date: 'sometime' },
      ],
      recentReviews: [
        {
          id: 1,
          title: 'Title',
          status: 'status',
          rating: '3',
          content:
            'lurem epsilon the hell are you doing this movie is trash and you are all trash and I hate the sky that you walk under you pieces of trash shit baka ',
        },
        {
          id: 2,
          title: 'Title',
          status: 'status',
          rating: '4',
          content:
            'lurem epsilon the hell are you doing this movie is trash and you are all trash and I hate the sky that you walk under you pieces of trash shit baka ',
        },
        {
          id: 3,
          title: 'Title',
          status: 'status',
          rating: '7',
          content:
            'lurem epsilon the hell are you doing this movie is trash and you are all trash and I hate the sky that you walk under you pieces of trash shit baka ',
        },
        {
          id: 4,
          title: 'Title',
          status: 'status',
          rating: '10',
          content:
            'lurem epsilon the hell are you doing this movie is trash and you are all trash and I hate the sky that you walk under you pieces of trash shit baka ',
        },
      ],
      status: 'Status',
      date: 'sometime',
    }
  },
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

//TODO(ALiHakim): fix title (when it gets too big)
