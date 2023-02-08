<template>
  <div class="add-category">
    <ModalForm class="dropdown-item add-category-item" :withAdd="withAdd" :movie_id="movie_id"/>
    <Dropdown
      class="dropdown-item add-category-item"
      :list="List"
      :movie_id="movie_id"
      :category="true"
      :type="type"
      placeholder="Select a List"
      @categorySelected="handleCategorySelected"
    ></Dropdown>
  </div>
</template>
<script>
import ModalForm from './ModalForm.vue'
import Dropdown from './Dropdown.vue'

export default {
  name: 'CategoriesAdd',
  props: ['List','movie_id','withAdd','type'],
  components: {
    Dropdown,
    ModalForm,
  },
  methods: {
    handleCategorySelected (id) {
      console.log(id)
      this.$emit('categorySelected', id )

    }
  }
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
