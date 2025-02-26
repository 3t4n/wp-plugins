import '../../../common/globals.js'
import Vue from 'vue'
import AgeGate from './components/AgeGate.vue'
import store from './store.js'
import './filters.js'

ageGator.app = new Vue({
    el: '#age-gator-root',
    template: '<age-gate></age-gate>',
    store,
    components: { AgeGate },
})