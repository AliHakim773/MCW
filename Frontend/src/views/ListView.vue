<template>
  <div>
    <header class="list-header">
      <router-link to="/profile">{{ Name }}</router-link
      >'s List
    </header>
    <div class="div-comp-white list"><header>hello</header></div>
  </div>
</template>
<script>
export default {
  name: 'ListView',
  data() {
    return {
      Name: 'BlackSea',
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
</style>
