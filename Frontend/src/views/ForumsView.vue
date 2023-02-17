<template>
  <div>
    <Mainbody
      ><main>
        <div class="forums-header">
          <ForumModel></ForumModel>
        </div>
        <div class="forums">
          <Forum
            v-for="forum in ForumsList"
            :user-name="forum.user.name"
            :submitDate="forum.created_at"
            :title="forum.title"
            :content="forum.content"
            :userid="forum.user.id"
            :forumid="forum.id"
            :home-page="false"
            :key="ForumsList.indexOf(forum)"
          />
        </div></main
    ></Mainbody>
  </div>
</template>
<script>
import Mainbody from '@/components/Mainbody.vue'
import Forum from '@/components/Forum.vue'
import ForumModel from '@/components/ForumModel.vue'
import axios from "axios";
export default {
  name: 'ForumsView',
  data() {
    return {
      ForumsList: [],
    }
  },
  components: {
    Mainbody,
    Forum,
    ForumModel,
  },

  async created(){
   const forums= await  axios.get('forums')
   this.ForumsList= forums.data.sort((a, b) => b.created_at - a.created_at);
    console.log({"fprums":this.ForumsList})
    console.log("asd")


  }
}
</script>
<style scoped>
main {
  margin: 1.5rem;
  padding: 0.5rem;
}
.forums-header {
  border-bottom: 1px solid var(--color-grey);
  padding-bottom: 1rem;
}
</style>
