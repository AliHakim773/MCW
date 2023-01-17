<template>
  <div class="user-info-container">
    <div
      class="user-name"
      @focus="toggleHidden()"
      @focusout="toggleHidden()"
      tabindex="0"
    >
      {{ userName }} <font-awesome-icon icon="fa-solid fa-angle-down" />
      <div v-if="!hidden" class="user-settings">
        <ul role="list">
          <li>
            <a @click="test()" href="http://localhost:8080/Profile">Profile</a
            >
<!--            TODO(ALIHakim):fix the frop down-->
          </li>
          <li>List</li>
          <li>Logout</li>
        </ul>
      </div>
    </div>
    <div class="user-image">
      <img src="../../public/Lissa.png" alt="PFP" />
    </div>
  </div>
</template>
<script>
import {mapGetters} from 'vuex'
export default {
  name: 'UserInfoLoggedIn',
  data() {
    return {
      userName: 'User Name',
      img: '../../public/Lissa.png',
      hidden: true,
    }
  },
  methods: {
    toggleHidden() {
      this.hidden = !this.hidden
    },
    test() {
      console.log('tst')
    },
    ...mapGetters(['user'])
  },
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
  display: flex;
  justify-content: center;
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
</style>
