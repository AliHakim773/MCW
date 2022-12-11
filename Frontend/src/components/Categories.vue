<template>
  <div class="add-category">
    <ModalForm class="dropdown-item add-category-item" />
    <Dropdown
      class="dropdown-item add-category-item"
      :list="List"
      :category="true"
      placeholder="Select a List"
    ></Dropdown>
  </div>
</template>
<script>
import ModalForm from './ModalForm.vue'
import Dropdown from './Dropdown.vue'

export default {
  name: 'CategoriesAdd',
  props: ['List'],
  components: {
    Dropdown,
    ModalForm,
  },
}
</script>
<style scoped>
.add-category {
  display: flex;
}
.dropdown-item {
  margin: 0 1rem;
}
.add-category-item {
  margin: 0;
  padding-inline: 5px;
}
</style>
