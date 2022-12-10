<template>
  <div class="btn-group">
    <button class="btn btn-primary-outline">Login</button>
    <button class="btn btn-primary">Register</button>
  </div>
</template>
<script>
export default {
  name: 'UserInfoLoggedOut',
}
</script>
<style scoped>
.btn-group {
  display: flex;
  align-items: center;
  padding: 5px;
  justify-content: space-around;
  width: 20rem;
}
.btn {
  width: 8rem;
}
</style>
