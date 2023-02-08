  <template>
  <section>
    <span class="create-forums-btn" @click="isComponentModalActive = true">
      Create Forum
    </span>

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
            <p class="modal-card-title">Create Forum</p>
            <button
              type="button"
              class="delete"
              @click="isComponentModalActive = false"
            />
          </header>
          <section class="modal-card-body">
            <b-field label="Title">
              <b-input v-model="title" type="Title"> </b-input>
            </b-field>
            <b-field label="Body">
              <b-input v-model="content " type="textarea"> </b-input>
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
  name: 'ForumModel',
  data() {
    return {
      isComponentModalActive: false,
      title:'',
      content:'',
    }
  },
  methods: {
   async handleCreate() {
      console.log('added')
      const res = await axios.post('forums', {
        user_id:this.user.id,
        title: this.title,
        content: this.content,
      })
     this.isComponentModalActive=false
     console.log(res)

   },
  },
  computed:{
    ...mapGetters(['user'])
  }
}
</script>
<style scoped>
.create-forums-btn {
  color: var(--primary-color);
  border: 1px solid var(--color-grey);
  border-radius: 1rem;
  padding: 0.3rem;
  margin-bottom: 1rem;
}
.create-forums-btn:hover {
  color: var(--color-black);
  cursor: pointer;
}
</style>
