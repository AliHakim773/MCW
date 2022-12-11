<template>
  <div>
    <header class="list-header">
      <router-link to="/profile">{{ Name }}</router-link
      >'s List
    </header>
    <div class="div-comp-white list">
      <header>
        <div class="category"><Categories :list="ListCategory" /></div>
        <div class="list-header"></div>
      </header>
    </div>
  </div>
</template>
<script>
import Categories from '@/components/Categories.vue'

export default {
  name: 'ListView',
  components: {
    Categories,
  },
  data() {
    return {
      Name: 'BlackSea',
      ListCategory: [
        // { id: 1, listName: 'Marvel' },
        // { id: 2, listName: 'roror' },
      ],
    }
  },
}
</script>
<style scoped>
.list-header {
  height: 10rem;
  display: flex;
  align-items: flex-start;
  justify-content: center;
  padding: 2rem;
  font-size: 2em;
  font-weight: 600;
}
.list {
  margin: 1rem 10rem 10rem 10rem;
}
list header {
  display: flex;
  flex-direction: column;
}
</style>
