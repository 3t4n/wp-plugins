<template>
  <div
    v-if="active"
    class="agpfb__wrapper"
  >
    <div class="agpfb__container">
      <div
        @click="setActive(false)"
        class="agpfb__background"
      ></div>
      <div class="agpfb__row">
        <div class="agpfb__rowInner">
          <header class="agpfb__header">
            <h2 class="agpfb__heading">
              Quick Feedback
            </h2>
          </header>
          <div class="agpfb__body">
            <h3 class="agpfb__title">
              If you have a moment, please share why you are deactivating Age Gator:
            </h3>
            <div class="agpfb__selection">
              <div
                v-for="(select, key) in selection"
                :key="key"
                class="agpfb__selectContainer"
              >
                <div class="agpfb__select">
                  <input
                    v-model="selected"
                    :id="`agpfb-${key}`"
                    :value="key"
                    class="agpfb__radio"
                    name="selection"
                    type="radio"
                  >
                  <label
                    :for="`agpfb-${key}`"
                    class="agpfb__label"
                  >
                    {{ select.label }}
                  </label>
                </div>
                <div
                  v-if="select.question && selected === key"
                  class="agpfb__questionContainer"
                >
                  <input
                    v-model="answer"
                    :placeholder="select.question"
                    id="agpfb-question"
                    class="agpfb__question"
                    type="text"
                  >
                </div>
              </div>
            </div>
            <footer class="agpfb__footer">
              <button
                @click="submit"
                class="button button-primary"
              >
                Submit & Deactivate
              </button>
              <a
                @click="deactivate"
                class="agpfb__skip"
                role="button"
              >
                Skip & Deactivate
              </a>
            </footer>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapMutations, mapActions } from 'vuex'
export default {
  data () {
    return {
      selected: '',
      answer: '',
      selection: {
        'do-not-need': {
          label: 'I no longer need the plugin',
        },
        'better-plugin': {
          label: 'I found a better plugin',
          question: 'What plugin do you prefer?'
        },
        'does-not-work': {
          label: 'I couldn\'t get the plugin to work',
          question: 'What didn\'t work for you?'
        },
        'temporary': {
          label: 'It\'s a temporariy deactivation'
        },
        'other': {
          label: 'Other',
          question: 'Please share the reason'
        }
      }
    }
  },
  computed: {
    ...mapGetters([
      'active'
    ])
  },
  watch: {
    selected () {
      this.answer = ''
    }
  },
  methods: {
    ...mapMutations([
      'setActive'
    ]),
    ...mapActions([
      'sendFeedback',
      'deactivate'
    ]),
    submit () {
      this.sendFeedback({
        selected: this.selection[this.selected].label,
        answer: this.answer
      })
    }
  }
}
</script>