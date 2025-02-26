<template>
  <div class="note-footer">

    <button
    class="edit-control save button"
    @click="saveNote"
    >{{labels.save}}</button>

  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

  export default {
    name: 'noteSubmit',
    props: [
      'contentView',
      'visibilityView',
      'tagView',
      'labels'],
    data: function () {
      return {
        isActive: false
      }
    },
    methods: {
      saveNote() {
        this.$emit('saveNote', true);
      }
     }

  }
</script>

<style scoped>
.active {
  font-weight: 700;
}
.save {
    margin-right: 0;
    margin-left: auto;
    display: block;
    margin-top: 4px;
    padding: 2px 20px;
}
</style>
