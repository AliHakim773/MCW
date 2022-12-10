<template>
  <Mainbody>
    <div class="login-wrapper">
      <form class="login-form" action="">
        <div class="login-form-title">Login</div>
        <b-field label="Username">
          <b-input required maxlength="30"></b-input>
        </b-field>
        <b-field label="Password">
          <b-input type="password" required v-model="password" password-reveal>
          </b-input>
        </b-field>
        <b-button
          class="login-btn"
          native-type="submit"
          tag="input"
          type="is-primary"
          value="Login"
        />
      </form>
    </div>
  </Mainbody>
</template>
<script>
import Mainbody from '@/components/Mainbody.vue'

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
