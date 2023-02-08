<template>
  <Mainbody>
    <div class="login-wrapper">
      <form class="login-form" @submit.prevent="hundelLogin">
        <div class="login-form-title">Login</div>
        <b-field label="Email">
          <b-input type="email" v-model="Username" required ></b-input>
        </b-field>
        <b-field label="Password">
          <b-input type="password" required v-model="password" password-reveal>
          </b-input>
        </b-field>
        <button type="submit">Login</button>
      </form>
    </div>
  </Mainbody>
</template>
<script>
import Mainbody from '@/components/Mainbody.vue'
import axios from "axios";

export default {
  name: 'LoginView',
  components: {
    Mainbody,
  },

  data() {
    return {
      Username: '',
      password: '',
    }
  },
  methods:{
     async hundelLogin() {
       const res = await axios.post('login', {
         email: this.Username,
         password: this.password,
       })
       console.log(res)
       localStorage.setItem('user', JSON.stringify(this.user))

       localStorage.setItem('token', res.data.token)
       await this.$store.dispatch('user', res.data.user)

       await this.$router.push('/')
     }

  },

}
</script>
<style scoped>
.login-wrapper {
  padding: 7rem;
  display: flex;
  justify-content: center;
  align-items: center;
}
.login-form {
  background-color: var(--secondary-bg-color);
  width: 25rem;
  display: flex;
  flex-direction: column;
  padding: 1.5em;
  border-radius: 0.5rem;
}
.login-form-title {
  font-weight: 700;
  font-size: 1.5em;
  padding-bottom: 1rem;
}
.login-btn {
  margin-top: 1rem;
}
</style>
