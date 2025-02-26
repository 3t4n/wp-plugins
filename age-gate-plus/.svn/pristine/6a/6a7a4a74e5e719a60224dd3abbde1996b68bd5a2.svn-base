import Vue from 'vue'
import App from './components/App.vue'
import store from './store.js'

window.ageGator = window.ageGator || {}
window.ageGator.feedbackApp = new Vue({
  el: '#age-gator-feedback-root',
  store,
  template: '<app/>',
  components: { App },
})

;(function($) {
  $(document).ready(function() {
    let $link = $('#the-list').find('[data-slug="age-gate-plus"] span.deactivate a');
    window.ageGator.deactivateUrl = $link.attr('href');
    $link.click(function (e) {
      e.preventDefault();
      window.ageGator.feedbackApp.$store.commit('setActive', true);
    });
  });
})(jQuery);