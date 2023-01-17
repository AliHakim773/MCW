<template>
  <div :class="border ? 'border-forum forum-body' : 'forum-body'">
    <div class="forums-figure" @click="goToUser">
      <div class="forums-credit">By: {{ UserName }}</div>
      <div class="forums-date">{{ submitDate }}</div>
      <!-- <img src="../../public/Lissa.png" class="forum-img" /> -->
    </div>
    <div class="forum-information">
      <div class="forum-title" @click="goToForum">{{ title }}</div>
      <div class="forum-content">
        {{ content }}
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'ForumsComponent',
  props: ['UserName', 'submitDate', 'ImgUrl', 'title', 'content', 'border'],
  methods: {
    goToForum() {
      this.$router.push('/forum')
    },
    goToUser() {
      console.log('User')
    },
  },
}
</script>
<style scoped>
.forum-body {
  display: flex;
  min-height: 15rem;
  border-bottom: 1px solid var(--color-grey);
}
.border-forum {
  border-left: 1px solid var(--color-grey);
  border-right: 1px solid var(--color-grey);
}
.forum-img {
  height: 13rem;
  width: 9rem;
  object-fit: fill;
  margin: 0 1rem 0 0;
}
.forums-figure {
  width: 10%;
  padding: 0.5rem;
  border-right: 1px solid var(--color-grey);
}
.forum-information {
  padding: 0.5rem;
  width: 90%;
}
.forum-title {
  color: var(--primary-color);
  cursor: pointer;
  font-weight: 500;
  font-size: 19px;
}
.forum-title:hover {
  text-decoration: underline;
}
.forum-content {
  padding-top: 1rem;
  line-height: 1.5em;
  width: 98%;
  font-size: 20px;
  min-height: 10rem;
}
</style>
