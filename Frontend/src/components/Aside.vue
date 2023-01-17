<template>
  <aside class="div-comp movie-aside">
    <img :src="imgLink" class="movie-img" />
    <slot></slot>
  </aside>
</template>
<script>
export default {
  name: 'AsideView',
  props: ['imgLink'],
}
</script>
<style scoped>
.movie-aside {
  width: 25%;
  display: flex;
  flex-direction: column;
}
.movie-img {
  border-radius: 0.5rem;
  aspect-ratio: 0.8;
  object-fit: fill;

  margin: 2rem 2rem;
}
</style>
