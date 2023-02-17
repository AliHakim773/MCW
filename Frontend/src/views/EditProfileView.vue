<template>
  <Mainbody>
    <main>
      <form @submit.prevent="hundelUpdate">
        <div class="grid-container">
          <div class="grid-item grid-item-1">User Name</div>
          <div class="grid-item grid-item-2">
            <input type="text" v-model="userdata.name"/>
          </div>
          <div class="grid-item grid-item-1">Age</div>
          <div class="grid-item grid-item-2">
            <input type="number" />
          </div>
          <div class="grid-item grid-item-1">Email (read only!)</div>
          <div class="grid-item grid-item-2">
            <input type="text"  v-model="userdata.email" readonly />
          </div>
          <div class="grid-item grid-item-1">Description</div>
          <div class="grid-item grid-item-2">
            <textarea />
          </div>
          <form @submit.prevent="uploadImage">
            <input type="file" @change="setImage"/>
            <button type="submit">Upload Image</button>
          </form>
          <img :src="imagePreview"/>
          <div class="grid-item grid-item-1">Image</div>
          <div class="grid-item grid-item-2">
            <input type="file" @change="uploadImage" />
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
import {mapGetters} from "vuex";
import axios from "axios";

export default {
  name: 'EditProfileView',
  components: {
    Mainbody,
  },
  data(){
    return{
      imagePreview:'',
      userdata:null,
      image:null,
    }
  },methods:{
    setImage(event) {
      this.image = event.target.files[0]
    },
    async uploadImage() {
      const formData = new FormData()
      formData.append('image', this.image)
      formData.append('user_id', this.user.id)
      console.log(this.image)
      console.log(this.user.id)
      try {
        const response = await axios.post('upload_image', formData)
        console.log(response.data)
      } catch (error) {
        console.error(error)
      }
    },
    previewImage(event) {
      const input = event.target;
      if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = (e) => {
          this.imagePreview = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
      }
    },
    async hundelUpdate() {
      await axios.put('users/'+this.user.id, {
        email: this.userdata.email,
        name:this.userdata.name,
      })
    },
    // async uploadImage() {
    //   const input = this.$refs.fileInput;
    //   if (input.files && input.files[0]) {
    //     const file = input.files[0];
    //     const formData = new FormData();
    //     formData.append('image', file);
    //
    //     try {
    //       // make a server request to save the image in your Vue project
    //       // and to save the image path or name in the database
    //       const response = await axios.post('/api/upload-image', formData);
    //       console.log(response.data);
    //     } catch (error) {
    //       console.error(error);
    //     }
    //   }
    // },
    // uploadImage(event){
    //   console.log(this.userdata.id)
    //   console.log(event.target.files[0])
    //   this.image = event.target.files[0];
    // },
    updateProfileImage() {
      let formData = new FormData();
      formData.append('image', this.image);
      console.log(formData)
      axios.post('/api/updateProfileImage', formData)
          .then(response => {
            console.log(response.data);
          })
          .catch(error => {
            console.log(error);
          });
    },
  },
  async created(){
    this.userdata=this.user
    console.log(this.user)
  },

  computed:{
    ...mapGetters(['user'])
  }
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
