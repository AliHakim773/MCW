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
            :user-name="forum.UserName"
            :submitDate="forum.Date"
            :title="forum.Title"
            :content="forum.Content"
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
export default {
  name: 'ForumsView',
  data() {
    return {
      ForumsList: [
        {
          UserName: 'Ali',
          Date: '20 - 20 - 2020',
          ImgUrl: '',
          Title: 'Lorem',
          Content:
            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla in facilis facere neque asperiores a veritatis ullam molestiae pariatur est, provident debitis deleniti, corporis laborum dolores totam accusantium iste aliquid saepe aspernatur sapiente quasi, magni ipsam! Commodi temporibus delectus totam! Veniam doloribus impedit tempora. Sunt nostrum incidunt unde nesciunt odio cumque recusandae dolor architecto illum eos minima neque enim, voluptatibus fugit? Sapiente cumque commodi veritatis placeat voluptate voluptas quae et laudantium sed nemo beatae assumenda quam quaerat tempore eaque eius, alias id laboriosam deleniti illum adipisci ullam tenetur. Consequatur architecto aperiam consectetur quaerat! Voluptatum, officiis modi. Optio quas aut iure?',
        },
        {
          UserName: 'Ali',
          Date: '20 - 20 - 2020',
          ImgUrl: '',
          Title: 'Lorem',
          Content:
            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla in facilis facere neque asperiores a veritatis ullam molestiae pariatur est, provident debitis deleniti, corporis laborum dolores totam accusantium iste aliquid saepe aspernatur sapiente quasi, magni ipsam! Commodi temporibus delectus totam! Veniam doloribus impedit tempora. Sunt nostrum incidunt unde nesciunt odio cumque recusandae dolor architecto illum eos minima neque enim, voluptatibus fugit? Sapiente cumque commodi veritatis placeat voluptate voluptas quae et laudantium sed nemo beatae assumenda quam quaerat tempore eaque eius, alias id laboriosam deleniti illum adipisci ullam tenetur. Consequatur architecto aperiam consectetur quaerat! Voluptatum, officiis modi. Optio quas aut iure?',
        },
        {
          UserName: 'Ali',
          Date: '20 - 20 - 2020',
          ImgUrl: '',
          Title: 'Lorem',
          Content:
            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla in facilis facere neque asperiores a veritatis ullam molestiae pariatur est, provident debitis deleniti, corporis laborum dolores totam accusantium iste aliquid saepe aspernatur sapiente quasi, magni ipsam! Commodi temporibus delectus totam! Veniam doloribus impedit tempora. Sunt nostrum incidunt unde nesciunt odio cumque recusandae dolor architecto illum eos minima neque enim, voluptatibus fugit? Sapiente cumque commodi veritatis placeat voluptate voluptas quae et laudantium sed nemo beatae assumenda quam quaerat tempore eaque eius, alias id laboriosam deleniti illum adipisci ullam tenetur. Consequatur architecto aperiam consectetur quaerat! Voluptatum, officiis modi. Optio quas aut iure?',
        },
        {
          UserName: 'Ali',
          Date: '20 - 20 - 2020',
          ImgUrl: '',
          Title: 'Lorem',
          Content:
            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla in facilis facere neque asperiores a veritatis ullam molestiae pariatur est, provident debitis deleniti, corporis laborum dolores totam accusantium iste aliquid saepe aspernatur sapiente quasi, magni ipsam! Commodi temporibus delectus totam! Veniam doloribus impedit tempora. Sunt nostrum incidunt unde nesciunt odio cumque recusandae dolor architecto illum eos minima neque enim, voluptatibus fugit? Sapiente cumque commodi veritatis placeat voluptate voluptas quae et laudantium sed nemo beatae assumenda quam quaerat tempore eaque eius, alias id laboriosam deleniti illum adipisci ullam tenetur. Consequatur architecto aperiam consectetur quaerat! Voluptatum, officiis modi. Optio quas aut iure?',
        },
      ],
    }
  },
  components: {
    Mainbody,
    Forum,
    ForumModel,
  },
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
