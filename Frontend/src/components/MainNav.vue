<template>
  <nav class="main-nav">
    <router-link class="logo" to="/">MCW</router-link>
    <UserInfoLoggedInVue v-if="user" />
    <UserInfoLoggedOutVue v-else />
  </nav>
</template>
<script>
import UserInfoLoggedInVue from './UserInfoLoggedIn.vue'
import UserInfoLoggedOutVue from './UserInfoLoggedOut.vue'
import {mapGetters} from 'vuex';
import axios from "axios";

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
  async created() {
    const res= await axios.get('user')
    await this.$store.dispatch('user', res.data)
  },
  computed:{
      ...mapGetters(['user'])
    }


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
