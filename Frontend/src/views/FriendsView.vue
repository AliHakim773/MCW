<template>
  <Mainbody
    ><div class="friends-body div-comp">
      <FriendItem
        v-for="i in Friends"
        :friends-date="i.date"
        :friends-name="i.name"
        :key="i.id"
      ></FriendItem></div
  ></Mainbody>
</template>
<script>
import Mainbody from '@/components/Mainbody.vue'
import FriendItem from '@/components/FriendItem.vue'

export default {
  name: 'FriendsView',
  components: {
    Mainbody,
    FriendItem,
  },
  data() {
    return {
      Friends: [
        {
          id: 0,
          name: 'Umaru',
          date: '1/1/2020',
        },
        {
          id: 1,
          name: 'cypher',
          date: '1/1/2020',
        },
        {
          id: 2,
          name: 'ali',
          date: '1/1/2020',
        },
        {
          id: 3,
          name: 'stupid',
          date: '1/1/2020',
        },
        {
          id: 4,
          name: 'vanitas',
          date: '1/1/2020',
        },
        {
          id: 5,
          name: 'yooohaaa',
          date: '1/1/2020',
        },
        {
          id: 6,
          name: 'balaba',
          date: '1/1/2020',
        },
      ],
    }
  },
}
</script>
<style scoped>
.friends-body {
  margin: 3rem;
  padding: 3rem 2rem 5rem 2rem;
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
}
</style>
