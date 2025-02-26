import Vue from 'vue'

import App from './App.vue'
import menuFix from './utils/admin-menu-fix'
import store from './state/store.js'

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#anoteabove-dash',
  store,
  render: h => h(App)
});


// fix the admin menu for the slug "vue-app"
menuFix('vue-app');
