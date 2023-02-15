<template>
  <div class="user-info-container">
    <div class="user-name" tabindex="0">
      {{ user.name }} <font-awesome-icon icon="fa-solid fa-angle-down" />
      <div class="user-settings">
        <ul role="list">
          <li>
            <a @click="go_to_profile(user.id)" >Profile</a>
            <!-- TODO(ALIHakim):fix the frop down -->
          </li>
          <li>List</li>
          <li @click.prevent="logout">Logout</li>
        </ul>
      </div>
    </div>
    <div class="user-image">
      <img @click="go_to_profile()" :src=img alt="PFP" />
    </div>
  </div>
</template>
<script>
import {mapGetters} from 'vuex'
import axios from "axios";
export default {
  name: 'UserInfoLoggedIn',
  data() {
    return {
      userName: 'User Name',
      img: '',
      hidden: true,
    }
  },
created() {
this.img="/"+this.user.image

    },
  methods: {
    go_to_profile(){
        // Push the router to /profile
        this.$router.push({ path: '/currentprofile' })

    },
    logout(){
      axios.post('logout') .then(response => {
       console.log(response)
      })
          .catch(error => {
            console.log(error);
          });
      localStorage.removeItem('token')
      try {
        this.$router.push('/')
        location.reload()

      }catch (error){
        console.log(error)
        location.reload()

      }
    }
  },computed:{
    ...mapGetters(['user'])
  }
}
</script>
<style scoped>
.user-info-container {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0px 15px;
}
.user-image {
  width: 2.8rem;
  aspect-ratio: 1;
  border: 1px solid var(--primary-color);
}
.user-name {
  position: relative;
  margin-right: 15px;
  color: var(--color-white);
  cursor: pointer;
}
.user-settings {
  position: absolute;
  top: 3rem;
  left: 0;
  right: 0;
  color: var(--primary-color);
  background-color: var(--color-white);
  font-weight: bold;
  border: 3px solid var(--primary-color);
  border-radius: 3px;
  display: none;
  justify-content: center;
  z-index: 10;
}
.user-settings > ul {
  width: 100%;
}
.user-settings li {
  text-align: center;
  border-bottom: 1px solid var(--primary-color);
  padding: 10px 0;
  width: inherit;
}
.user-settings li:last-child {
  border-bottom: none;
}
.user-name:focus > .user-settings,
.user-settings:hover {
  display: flex;
}
</style>
