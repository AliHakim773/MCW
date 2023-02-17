<template>
  <div>
    <b-field>
      <b-select
        :placeholder="computedPlaceholder"
        @change.native="ChangeCategory($event)"
        rounded
      >
        <option v-if="list.length === 0" value="">Create a Category</option>
        <option v-else v-for="i in list" :key="i.id" :value="i.id">
          {{ i.list_name }}
        </option>
      </b-select>
    </b-field>
  </div>
</template>
<script>
import axios from "axios";
import {mapGetters} from "vuex";

export default  {
  name: 'DropDown',
  props: ['list', 'category', 'placeholder','movie_id','type'],
  computed: {
    computedPlaceholder() {
      if (this.list.length === 0) return 'Create a category'
      else return this.placeholder
    },
    ...mapGetters(['user'])

  },async created() {
    const res= await axios.get('user')
    await this.$store.dispatch('user', res.data)
  },
  methods: {
    async ChangeCategory(event) {
      let id = event.target.value

      if (this.type==="addmovietocat"){
        console.log(id)
        const res = await axios.post('addMovieToList', {
          user_list_id: id,
          movie_id: this.movie_id,
          user_id:this.user.id
        })
        console.log(res)
      }else if (this.type==="rate"){
        console.log(id)
        console.log(this.user.id)
        console.log(this.movie_id)
        const res = await axios.post('rates',
   {
          rating: id,
          review: "test",
          user_id: this.user.id,
          movie_id: this.movie_id,
        })
        console.log(res)
      }else {
        console.log("select")
        this.$emit('categorySelected', id )
      }


    },
  },
}
</script>
<style scoped></style>
