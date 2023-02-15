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
              <b-input type="Name" v-model="categoryname" :value="Name"> </b-input>
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
import axios from "axios";
import {mapGetters} from "vuex";

export default {
  name: 'ModalForm',
  props: ['Name','withAdd','movie_id'],
  data() {
    return {
      categoryname:'',
      isComponentModalActive: false,
    } //TODO(ALiHakim): make isComponentModalActive a global variable
  },

  async created() {
    const res= await axios.get('user')
    await this.$store.dispatch('user', res.data)
  },
  computed:{
    ...mapGetters(['user'])
  },
  methods: {
   async handleCreate() {

      console.log('added')
      console.log(this.withAdd)
     console.log(this.categoryname)
      if (this.withAdd){
        const res = await axios.post('userLists', {
          list_name: this.categoryname,
          user_id: this.user.id,
        })
        const catId=res.data
        console.log({"res.data":catId})
        const res2 = await axios.post('addMovieToList', {
          user_list_id: catId,
          movie_id: this.movie_id,
          user_id:this.user.id
        })
        console.log(res2)
      }else {

        const res = await axios.post('userLists', {
          list_name: this.categoryname,
          user_id: this.user.id,
        })
        console.log(res.data)

      }

    },

  },
}
</script>
<style scoped>
/* Buefy had overflow removed when opening the Modal */
/* TODO(AliHakim):add this to the global css */
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
