<template>
  <div class="note-content-container">
    <span
    class="subtext"
    v-if="contentView"
    >{{labels.content}}:</span>
    <span
    class="display-content"
    v-if="open"
    style="white-space: pre-line;">{{note.content}}</span>
    <textarea
    v-if="editing"
    name="note-content"
    class="note-content"
    v-model="inputVal"
    placeholder="Add Note Content"
    style="height:auto;"
    ></textarea>
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
        textAreaHight: null
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
     }
   }
  }
</script>

<style scoped>

</style>
