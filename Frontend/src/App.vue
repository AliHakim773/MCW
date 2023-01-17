 <template>
  <div id="app">
    <MainNav />
    <router-view />
    <MainFooter />
  </div>
</template>
<script>
import MainNav from '@/components/MainNav.vue'
import MainFooter from './components/MainFooter.vue'
// import Mainbody from './components/Mainbody.vue'

export default {
  components: {
    MainNav,
    MainFooter,
    // Mainbody,
  },
}
</script>
<style>
@import './assets/style.css';
</style>
