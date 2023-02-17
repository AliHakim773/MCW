<template>
  <div :class=" homePage ? 'forum-white-color forum-body' : 'forum-grey-color forum-body'">
    <div class="forums-figure" @click="goToUser(userid)">
      <img src="../../public/Lissa.png" class="forum-img" />
      <div class="forums-credit">By: {{ UserName }}</div>
    </div>
    <div class="forum-information">
      <div class="forum-title" @click="goToForum(forumid,UserName)">{{ title }}</div>
      <div class="forum-content">
        {{ content }}
      </div>
      <div class="forums-date">{{ submitDate }}</div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'ForumsComponent',
  props: ['UserName', 'submitDate', 'ImgUrl', 'title', 'content','userid','forumid', 'homePage'],
  methods: {
    goToForum(forumid,user_name) {
      this.$router.push({ path: '/forum/' + forumid+'/' +user_name })
      console.log(forumid)
      console.log(user_name)
    },
    goToUser(user_id) {
      this.$router.push({ path: '/profile/' + user_id })

    },
  },
}
</script>
<style scoped>
.forum-body {
  display: flex;
  min-height: 15rem;
  border-radius: 1rem;
  margin: 1rem 0 1rem 0;
}
.forum-grey-color{
  background-color: var(--primary-bg-color) ;
}
.forum-white-color{
  background-color: var(--color-white) ;
}
.forum-img {
  height: 13rem;
  width: 100%;
  object-fit: fill;
  margin: 0 1rem 0 0;
  border-radius: 1rem 0rem 0 0;
}
.forums-figure {
  width: 10rem;
  padding: 0rem;
  border-right: 1px solid var(--color-white);
}
.forum-information {
  padding: 0.5rem 0.5rem 0.5rem 1.5rem;
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
.forums-credit{
  text-align: center;
  color: var(--color-black);
}
</style>
