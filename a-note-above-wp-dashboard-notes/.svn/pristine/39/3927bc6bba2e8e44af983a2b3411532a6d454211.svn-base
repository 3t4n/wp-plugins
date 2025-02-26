<template>
  <div class="note-edit-bar">
    <span class="subtext">{{labels.controls}}:</span>
    <div class="edit-nav">
    <ul class="content-visibility">
      <li class="edit-navigation">
        <button
        class="edit-control setting button"
        v-bind:class="{ active: contentView === true }"
        v-on:click="viewVisibility('content')">
          {{labels.content}}
        </button>
      </li>
      <li class="edit-navigation">
        <button
        class="edit-control setting button"
        v-bind:class="{ active: visibilityView === true }"
        v-on:click="viewVisibility('visibility')"
        >
          {{labels.visibility}}
        </button>
      </li>
      <li class="edit-navigation">
        <button
        class="edit-control setting button"
        v-bind:class="{ active: tagView === true }"
        v-on:click="viewVisibility('tags')"
        >
          {{labels.editTag}}
        </button>
      </li>
    </ul>
    <ul class="save-delete">
      <li class="edit-navigation">
        <button class="edit-control cancel button" v-on:click="cancel">{{labels.cancel}}</button>
      </li>
    <li class="edit-navigation">
      <button
      class="edit-control delete button"
      @click="removeNote"
      >{{labels.delete}}</button>
    </li>
    </ul>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'noteNavigation',
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
      viewVisibility(page) {
        this.$emit('changeView', page)
      },
      cancel() {
        this.$emit('cancel', true);
      },
      removeNote() {
        this.$emit('delete', true);
      }
    }
  }
</script>

<style scoped>

.active {
  font-weight: 700;
}

</style>
