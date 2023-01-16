<template>
  <div>
    <div class="more-info">
      <span class="forums-title">TOP FORUMS</span>
      <router-link :to="link">view more</router-link>
    </div>
    <div class="forums-list">
      <Forum
        v-for="forum in ForumsList"
        :user-name="forum.UserName"
        :submitDate="forum.Date"
        :title="forum.Title"
        :content="forum.Content"
        :key="ForumsList.indexOf(forum)"
        border="false"
      />
    </div>
  </div>
</template>
<script>
import Forum from './Forum.vue'

export default {
  name: 'TopForums',
  components: {
    Forum,
  },
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
