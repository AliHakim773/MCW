<template>
  <Mainbody>
    <Forum
      :user-name="this.user_name"
      :content="forum.content"
      :submit-date="forum.created_at"
      :userid="forum.user_id"
      :title="forum.title"
    />
    <div class="comments">
      <Forum
        v-for="forum in commentsList"
        :user-name="forum.user_id"
        :submitDate="forum.created_at"
        :content="forum.comment"
        :key="commentsList.indexOf(forum)"
        :userid="forum.user_id"
        border="true"
      />
    </div>
  </Mainbody>
</template>
<script>
import Mainbody from '@/components/Mainbody.vue'
import Forum from '@/components/Forum.vue'
import axios from "axios";
export default {
  name: 'ForumView',
  components: {
    Forum,
    Mainbody,
  },
  data() {
    return {
      forum:null,
      commentsList: [],
    }
  },
computed:{
    id(){
      return this.$route.params.id
    },
  user_name(){
      return this.$route.params.username
  }
},async created(){
    const comments=(await axios.get('comments')).data
    let filComments = comments.filter(comment => comment.forum_id == this.id);
    this.commentsList=filComments
    const forums= await  axios.get('forums/'+this.id)

    this.forum= forums.data
  }
}
</script>
<style scoped>
.comments {
  padding-left: 5rem;
}
</style>
