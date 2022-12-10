<template>
  <nav class="main-nav">
    <router-link class="logo" to="/">MCW</router-link>
    <UserInfoLoggedOutVue v-if="IsLoggedOut" />
    <UserInfoLoggedInVue v-else />
  </nav>
</template>
<script>
import UserInfoLoggedInVue from './UserInfoLoggedIn.vue'
import UserInfoLoggedOutVue from './UserInfoLoggedOut.vue'

export default {
  name: 'MainNav',
  components: {
    UserInfoLoggedInVue,
    UserInfoLoggedOutVue,
  },
  data() {
    return {
      IsLoggedOut: false,
    }
  },
}
</script>
<style scoped>
.main-nav {
  background-color: var(--color-black);
  width: 100%;
  height: 4rem;
  display: flex;
  justify-items: center;
  justify-content: space-between;
}
.logo {
  font-family: var(--logo-font-family);
  font-size: 3rem;
  color: var(--color-white);
  padding-left: 10px;
}
.logo:hover {
  color: var(--color-white);
}
</style>
