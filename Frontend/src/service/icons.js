import Vue from 'vue'

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faAngleDown } from '@fortawesome/free-solid-svg-icons'

import { faFolderPlus } from '@fortawesome/free-solid-svg-icons'

import {
  faFacebook,
  faDiscord,
  faTwitter,
  faInstagram,
  faTiktok,
} from '@fortawesome/free-brands-svg-icons'

/* add icons to the library */
library.add(
  faAngleDown,
  faFacebook,
  faDiscord,
  faTwitter,
  faInstagram,
  faTiktok,
  faFolderPlus
)

/* add font awesome icon component */
Vue.component('font-awesome-icon', FontAwesomeIcon)
