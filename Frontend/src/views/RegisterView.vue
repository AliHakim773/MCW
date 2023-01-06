<template>
  <Mainbody>
    <div class="register-wrapper">
      <form class="register-form" @submit.prevent="hundelSubmit">
        <div class="register-form-title">Register</div>
        <b-field label="Username">
          <b-input v-model="Username" required maxlength="24"></b-input>
        </b-field>
        <b-field label="Email">
          <b-input type="email" v-model="Email" required maxlength="30">
          </b-input>
        </b-field>
        <b-field label="Password">
          <b-input type="password" required v-model="password" password-reveal>
          </b-input>
        </b-field>
        <button type="submit">Sign Up</button>

      </form>
    </div>
  </Mainbody>
</template>

<script>
import Mainbody from '@/components/Mainbody.vue'

import axios from "axios";

export default {
  name: 'RegisterView',
  components: {
    Mainbody,
  },
  data() {
    return {

      Username: '',
      Email: '',
      password: '',
    }
  },
  methods: {
    hundelSubmit() {
      const data = {
        name: this.Username,
        email: this.Email,
        pass: this.password,
      }

      axios
        .post('http://127.0.0.1:8000/register', data)
        .then((res) => {
          console.log(res)
        })
        .catch((err) => {
          console.log(err)
        })
      console.log(data)
    },
  },
}
</script>
<style scoped>
.register-wrapper {
  padding: 7rem;
  display: flex;
  justify-content: center;
  align-items: center;
}
.register-form {
  background-color: var(--secondary-bg-color);
  width: 25rem;
  display: flex;
  flex-direction: column;
  padding: 1.5em;
  border-radius: 0.5rem;
}
.register-form-title {
  font-weight: 700;
  font-size: 1.5em;
  padding-bottom: 1rem;
}
.register-btn {
  margin-top: 1rem;
}
</style>
