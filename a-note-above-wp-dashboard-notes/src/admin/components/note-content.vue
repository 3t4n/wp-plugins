<template>
  <div class="note-content-container">
    <transition name="slide-fade">
      <span
      class="subtext"
      v-if="editing"
      >{{labels.content}}:</span>
    </transition>
    <transition name="slide-fade">
      <span
      class="display-content"
      v-if="open"
      style="white-space: pre-line;">{{note.content}}</span>
    </transition>
    <transition name="slide-fade">
      <textarea
      v-if="editing"
      name="note-content"
      class="note-content"
      v-model="inputVal"
      ref="input"
      placeholder="Add Note Content"
      :style="inputStyle"
      @keyup="adjustHeight"
      ></textarea>
    </transition>

  </div>
</template>

<script>
  export default {
    name: 'noteContent',
    props: [
      'open',
      'note',
      'editing',
      'contentView',
      'tempContent',
      'labels'
    ],
    data: function () {
      return {
        title: '',
        id: '',
        localTemp: '',
        textAreaHight: '0',
        inputHeight: '120'

      }
    },
    methods: {
      adjustHeightElase: function (el){
          el.style.height = (el.scrollHeight > el.clientHeight) ? (el.scrollHeight)+"px" : "60px";
      },
      adjustHeight () {
        this.$nextTick(() => {
          this.inputHeight = `${this.$refs.input.scrollHeight}px`
        })
      }
    },
    watch: {
      editing: function() {
        if (this.editing) {
          this.adjustHeight();
        }
      }
    },
    computed: {
      inputVal: {
        get() {
          return this.tempContent;
        },
        set(val) {
          this.$emit('input', val);
        }
      },
      inputStyle: function () {
        return {
          'min-height': this.inputHeight
        }
      }
   }
  }
</script>

<style scoped>

</style>
