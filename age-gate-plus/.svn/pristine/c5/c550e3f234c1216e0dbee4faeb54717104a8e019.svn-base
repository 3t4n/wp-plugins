  
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)
 
const store = new Vuex.Store({
  state: {
    active: false
  },
  getters: {
    active (state) {
      return state.active
    }
  },
  mutations: {
    setActive (state, isActive) {
      state.active = isActive
    }
  },
  actions: {
    deactivate () {
      window.location.href = window.ageGator.deactivateUrl
    },
    sendFeedback ({ dispatch }, payload) {
      jQuery.ajax({
        url: window.ajaxurl,
        method: 'POST',
        data: {
          action: 'postFeedback',
          security: window.ageGator.nonce,
          payload
        },
    })
      .done(res => console.log(res))
      .fail(res => console.error(res))
      .always(() => dispatch('deactivate'))
    }
  },
})

export default store