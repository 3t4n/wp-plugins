import Vue from 'vue'
import Router from 'vue-router'
import Home from 'admin/pages/Home.vue'
import Settings from 'admin/pages/Settings.vue'
import AddNew from 'admin/pages/AddNew.vue'
import Edit from 'admin/pages/Edit.vue'
import { data } from 'jquery'

Vue.use(Router)

const router = new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/settings',
      name: 'Settings',
      component: Settings
    },
    {
      path: '/add-new',
      name: 'AddNew',
      component: AddNew
    },
    {
      path: '/edit/:id',
      name: 'Edit',
      component: Edit
    },
  ]
})

router.afterEach((to, from) => {
  const root = document.querySelector('#toplevel_page_vue-app')
  const current = root.querySelector('.current')
  const anchors = root.querySelectorAll('.wp-submenu li a')

  anchors.forEach((entry) => {
      entry.parentElement.classList.remove('current');
  });

  anchors.forEach((entry) => {
    if(('#' + to.path) == entry.hash)
    {
      entry.parentElement.classList.add('current');
    }
  });
})

export default router
