<template>
  <div>
    <header class="list-header">
      <router-link to="/profile">{{ Name }}</router-link
      >'s List
    </header>
    <div class="div-comp-white list">
      <header>
        <div class="category">
          <div class="current-list-title">{{ CurrentList }}</div>
          <Categories :list="ListCategory" />
        </div>
        <div class="list-nav">
          <div class="list-title" style="width: 5%">#</div>
          <div class="list-title" style="width: 10%">Image</div>
          <div class="list-title" style="width: 65%">Title</div>
          <div class="list-title" style="width: 10%">score</div>
          <div class="list-title" style="width: 10%"></div>
        </div>
        <ListItem
          :number="number"
          :score="score"
          :title="title"
          :deletable="deletable"
          class="list-items"
        />
      </header>
    </div>
  </div>
</template>
<script>
import Categories from '@/components/Categories.vue'
import ListItem from '@/components/ListItem.vue'

export default {
  name: 'ListView',
  components: {
    Categories,
    ListItem,
  },
  data() {
    return {
      Name: 'BlackSea',
      ListCategory: [
        // { id: 1, listName: 'Marvel' },
        // { id: 2, listName: 'roror' },
      ],
      CurrentList: 'Current List Name',
      number: 1,
      title: 'Title',
      score: '8',
      deletable: false,
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
  margin: 1rem 7rem 7rem 7rem;
  padding: 0.4rem;
}
.list header {
  display: flex;
  flex-direction: column;
}
.category {
  display: flex;
  justify-content: space-between;
}
.current-list-title {
  padding: 0.7rem;
  font-size: 1.5em;
  font-weight: 400;
  color: var(--color-black);
}
.list-nav {
  display: flex;
}
.list-items:not(:last-child) {
  border-bottom: 1px solid var(--color-grey);
}
.list-title {
  text-align: center;
  padding-bottom: 0.4rem;
  font-size: 1.3em;
  font-weight: 400;
  color: var(--color-black);
  border-bottom: 1px solid var(--color-grey);
}
.list-title:not(:first-child) {
  border-left: 1px solid var(--color-grey);
}
</style>
