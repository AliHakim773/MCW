<template>
  <div class="list-small">
    <figure><img class="list-img" :src="imgLink" /></figure>
    <div class="list-details">
      <div class="list-title">{{ title }}</div>
      <div class="list-status">{{ status }}</div>
      <div class="list-date">{{ date }}</div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'ListItemSmall',
  props: ['title', 'status', 'date', 'imgLink'],
}
</script>
<style scoped>
.list-small {
  display: flex;
  justify-content: flex-start;
}
.list-img {
  width: 75px;
  height: 90px;
  object-fit: cover;
  border-radius: 0.3rem;
}
.list-details {
  padding: 0.5rem;
}
.list-title {
  color: var(--primary-color);
  font-weight: 500;
}
.list-status {
  color: var(--color-black);
  font-weight: 400;
}
.list-date {
  color: var(--color-grey);
  font-weight: 400;
}
</style>
