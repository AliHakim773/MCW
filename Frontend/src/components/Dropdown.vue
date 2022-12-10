<template>
  <div>
    <b-field>
      <b-select
        :placeholder="placeholder"
        @change.native="ChangeCategory($event)"
        rounded
      >
        <option v-if="list.length == 0" value="">Create a List</option>
        <option v-else v-for="i in list" :key="i.id" value="i.listName">
          {{ i.listName }}
        </option>
      </b-select>
    </b-field>
  </div>
</template>
<script>
export default {
  name: 'DropDown',
  props: ['list', 'category', 'placeholder'],
  data() {
    return {
      test: '',
    }
  },
  methods: {
    ChangeCategory(event) {
      if (this.category) console.log(event.target.value)
      else console.log(event.target.value)
    },
  },
}
</script>
<style scoped></style>
