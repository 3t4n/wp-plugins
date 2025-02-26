import Vue from 'vue'
import store from './store'

Vue.filter('age', val => {
  return val.replace(/\[AGE\]/g, store.getters.getOptions.age_gator_age)
})

Vue.filter('multiline', val => {
  return val.replace(/\n/g, '<br>');
})
