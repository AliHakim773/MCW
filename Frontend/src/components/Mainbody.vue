<template>
  <div class="main-body">
    <nav class="site-nav-container">
      <div class="site-nav">
        <router-link class="site-nav-link" to="/">Home</router-link>
        <router-link class="site-nav-link" to="/login">loggin</router-link>
        <router-link class="site-nav-link" to="/register">Register</router-link>
        <router-link class="site-nav-link" to="/Movie">Movie</router-link>
        <router-link class="site-nav-link" to="/Profile">Profile</router-link>
      </div>
      <div class="search">
        <form>
          <input type="text" placeholder="Search" />
        </form>
      </div>
    </nav>
    <slot></slot>
  </div>
</template>
<script>
export default {
  name: 'MainBody',
}
</script>
<style scoped>
.main-body {
  background-color: var(--color-white);
  width: 90%;
  margin: 3rem auto;
  border-radius: 1rem;
  padding-bottom: 5rem;
  /* min-height: 700px; */
}
.site-nav {
  display: flex;
  justify-content: center;
  align-items: center;
}
.site-nav-container {
  background-color: var(--primary-color);
  border-top-left-radius: 1rem;
  border-top-right-radius: 1rem;
  padding: 1em 2rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.site-nav-link {
  color: var(--color-white);
  font-weight: 500;
  text-decoration: none;
  font-size: 1.2em;
  margin: 0 0.5em;
}
.search input {
  border-radius: 1rem;
  padding: 3px 10px;
  border: none;
}
</style>
