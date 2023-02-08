<template>
  <div>
    <div class="more-info">
      <span class="forums-title">TOP FORUMS</span>
<!--      <router-link :to="link">view more</router-link>-->
    </div>
    <div class="forums-list">
      <Forum
          v-for="forum in ForumsList"
          :user-name="forum.user.name"
          :submitDate="forum.created_at"
          :title="forum.title"
          :content="forum.content"
          :userid="forum.user.id"
          :forumid="forum.id"
          :key="ForumsList.indexOf(forum)"
          border="false"
      />

    </div>
  </div>
</template>
<script>
import Forum from './Forum.vue'
import axios from "axios";

export default {
  name: 'TopForums',
  components: {
    Forum,
  },
  data() {
    return {
      ForumsList: [],
    }
  },
  async created(){
    const forums= await  axios.get('forums')
    this.ForumsList= forums.data.sort((a, b) => b.created_at - a.created_at);
  }
}
</script>
<style scoped>
.forums-title {
  font-weight: 600;
  color: var(--color-black);
}
.more-info {
  display: flex;
  font-weight: 600;
  color: var(--primary-color);
  justify-content: space-between;
}
.forums-list {
  background-color: var(--secondary-bg-color);
  padding: 0.5rem;
  border-radius: 0.5rem;
}
</style>
