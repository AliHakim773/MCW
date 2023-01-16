<template>
  <Mainbody>
    <Forum
      :user-name="forum.UserName"
      :content="forum.Content"
      :submit-date="forum.Date"
      :title="forum.Title"
    />
    <div class="comments">
      <Forum
        :user-name="forum.UserName"
        :content="forum.Content"
        :submit-date="forum.Date"
      />
      <Forum
        :user-name="forum.UserName"
        :content="forum.Content"
        :submit-date="forum.Date"
      />
      <Forum
        :user-name="forum.UserName"
        :content="forum.Content"
        :submit-date="forum.Date"
      />
      <Forum
        :user-name="forum.UserName"
        :content="forum.Content"
        :submit-date="forum.Date"
      />
    </div>
  </Mainbody>
</template>
<script>
import Mainbody from '@/components/Mainbody.vue'
import Forum from '@/components/Forum.vue'

export default {
  name: 'ForumView',
  components: {
    Forum,
    Mainbody,
  },
  data() {
    return {
      forum: {
        UserName: 'Ali',
        Date: '20 - 20 - 2020',
        ImgUrl: '',
        Title: 'Lorem',
        Content:
          'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla in facilis facere neque asperiores a veritatis ullam molestiae pariatur est, provident debitis deleniti, corporis laborum dolores totam accusantium iste aliquid saepe aspernatur sapiente quasi, magni ipsam! Commodi temporibus delectus totam! Veniam doloribus impedit tempora. Sunt nostrum incidunt unde nesciunt odio cumque recusandae dolor architecto illum eos minima neque enim, voluptatibus fugit? Sapiente cumque commodi veritatis placeat voluptate voluptas quae et laudantium sed nemo beatae assumenda quam quaerat tempore eaque eius, alias id laboriosam deleniti illum adipisci ullam tenetur. Consequatur architecto aperiam consectetur quaerat! Voluptatum, officiis modi. Optio quas aut iure?',
      },
    }
  },
}
</script>
<style scoped>
.comments {
  padding-left: 5rem;
}
</style>
