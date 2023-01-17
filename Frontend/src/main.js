import Vue from 'vue'
import App from './App.vue'
import router from './router'
import './assets/reset.css'
import './assets/style.css'
import './service/buefy'
import './service/icons'
import './service/axios'
import './assets/bulma.sass'
import './service/vuex'

Vue.config.productionTip = false

new Vue({
  router,
  render: (h) => h(App),
}).$mount('#app')
