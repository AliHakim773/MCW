import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './service/vuex'
import './assets/reset.css'
import './assets/style.css'
import './service/buefy'
import './service/icons'
import './service/axios'
import './assets/bulma.sass'
import './service/vuex'
import _ from 'lodash'
Vue.config.productionTip = false

new Vue({
  router,
  store,
  _,
  render: (h) => h(App),
}).$mount('#app')
