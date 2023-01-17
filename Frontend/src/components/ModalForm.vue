<template>
  <section>
    <button class="add-cat" @click="isComponentModalActive = true">
      <font-awesome-icon icon="fa-solid fa-folder-plus" />
    </button>

    <b-modal
      scroll="keep"
      v-model="isComponentModalActive"
      has-modal-card
      trap-focus
      :destroy-on-hide="false"
      aria-role="dialog"
      aria-label="Example Modal"
      close-button-aria-label="Close"
      aria-modal
    >
      <form action="">
        <div class="modal-card">
          <header class="modal-card-head">
            <p class="modal-card-title">Create a Category</p>
            <button
              type="button"
              class="delete"
              @click="isComponentModalActive = false"
            />
          </header>
          <section class="modal-card-body">
            <b-field label="Category Name">
              <b-input type="Name" :value="Name"> </b-input>
            </b-field>
          </section>
          <footer class="modal-card-foot">
            <b-button label="Close" @click="isComponentModalActive = false" />
            <b-button label="Create" @click="handleCreate" type="is-primary" />
          </footer>
        </div>
      </form>
    </b-modal>
  </section>
</template>

<script>
export default {
  name: 'ModalForm',
  props: ['Name'],
  data() {
    return {
      isComponentModalActive: false,
    } //TODO(ALiHakim): make isComponentModalActive a global variable
  },
  methods: {
    handleCreate() {
      console.log('added')
    },
  },
}
</script>
<style scoped>
/* Buefy had overflow removed when opening the Modal */
.is-cliped {
  overflow-y: scroll !important;
}
.add-cat {
  background-color: var(--color-white);
  border: none;
  border-radius: 2rem;
  width: 40px;
  height: 40px;
  color: var(--color-black);
  font-weight: 800;
}
</style>
