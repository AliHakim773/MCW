<template>
  <Mainbody
    ><div class="friends-body div-comp"><FriendItem></FriendItem></div
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
