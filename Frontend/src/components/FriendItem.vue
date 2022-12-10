<template>
  <div class="friend-item">
    <img src="../../public/Lissa.png" class="friends-img" />
    <div class="friends-details">
      <div class="friend-name">{{ FriendsName }}</div>
      <div class="friends-date">{{ FriendsDate }}</div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'FriendItem',
  props: ['FriendsName', 'FriendsDate'],
}
</script>
<style scoped>
.friends-img {
  border-radius: 1rem 0 0 1rem;
  height: 8rem;
  width: 6rem;
  object-fit: cover;
}
.friend-item {
  /* border: 1px solid var(--color-black); */
  height: 8rem;
  margin: 0.3rem;
  border-radius: 1rem;
  background-color: white;
  width: 30%;
  display: flex;
  padding: 0;
}
.friends-details {
  padding-left: 1rem;
  display: flex;
  flex-direction: column;
  justify-content: center;
}
.friend-name {
  color: var(--primary-color);
  font-size: 1.4em;
  font-weight: 400;
}
.friend-date {
  color: var(--color-grey);
  font-size: 1em;
  font-weight: 400;
}
</style>
