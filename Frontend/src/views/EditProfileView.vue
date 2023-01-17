<template>
  <Mainbody>
    <main>
      <form action="">
        <div class="grid-container">
          <div class="grid-item grid-item-1">User Name</div>
          <div class="grid-item grid-item-2">
            <input type="text" />
          </div>
          <div class="grid-item grid-item-1">Age</div>
          <div class="grid-item grid-item-2">
            <input type="number" />
          </div>
          <div class="grid-item grid-item-1">Location</div>
          <div class="grid-item grid-item-2">
            <input type="text" />
          </div>
          <div class="grid-item grid-item-1">Description</div>
          <div class="grid-item grid-item-2">
            <textarea />
          </div>
          <div class="grid-item grid-item-1">Image</div>
          <div class="grid-item grid-item-2">
            <input type="file" />
          </div>
          <div class="grid-item grid-item-1">
            <input type="submit" value="Submit" />
          </div>
        </div>
      </form>
    </main>
  </Mainbody>
</template>
<script>
import Mainbody from '@/components/Mainbody.vue'

export default {
  name: 'EditProfileView',
  components: {
    Mainbody,
  },
}
</script>
<style scoped>
main {
  padding: 1rem;
}
.grid-container {
  display: grid;
  grid-template-columns: 25% 75%;
  grid-template-rows: repeat(6, 1fr);
}

.grid-item-1 {
  grid-column: 1 / 2;
}

.grid-item-2 {
  grid-column: 2 / 3;
}
.grid-item {
  padding: 1rem;
}
.grid-item:not(:last-child) {
  border-bottom: 1px solid var(--color-grey);
}
</style>
