<template>
  <div class="list-item">
    <div class="list-cell" style="width: 5%">{{ number }}</div>
    <div class="list-cell list-cell-img" style="width: 10%">
      <img src="../../public/Lissa.png" class="list-img" :alt="title" />
    </div>
    <div class="list-cell list-cell-title" style="width: 55%">{{ title }}</div>
    <div class="list-cell" style="width: 10%"></div>
    <div class="list-cell" style="width: 10%">{{ score }}</div>
    <div class="list-cell" style="width: 10%">
      <font-awesome-icon
        icon="fa-solid fa-trash-can"
        class="delete-item"
        @click="test()"
      />
    </div>
  </div>
</template>
<script>
export default {
  name: 'ListItem',
  props: ['number', 'title', 'score'],
  methods: {
    test() {
      console.log('test')
    },
  },
}
</script>
<style scoped>
.list-item {
  display: flex;
}
.list-cell {
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 1.3em;
  font-weight: 400;
  color: var(--color-black);
}
.list-cell:not(:first-child) {
  border-left: 1px solid var(--color-grey);
}
.list-img {
  height: 7.5rem;
  width: 6rem;
  object-fit: cover;
}
.list-cell-img {
  padding: 0.5rem;
  display: flex;
  justify-content: center;
  align-items: center;
}
.list-cell-title {
  display: flex;
  justify-content: flex-start;
  padding-left: 2rem;
}
.delete-item:hover {
  color: var(--color-danger);
  cursor: pointer;
}
</style>
