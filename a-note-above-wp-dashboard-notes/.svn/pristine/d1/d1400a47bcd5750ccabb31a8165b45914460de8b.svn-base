<template>
  <li class="notes">

    <div
    class="note-container"
    >
      <div
      class="note-header"
      >
        <div class="title-container">
          <span class="subtext">{{labels.title}}</span>
          <h3
          v-on:click.self="openNote"
          v-if="!isEditing"
          >
          {{note.title}}</h3>
          <input
          type="text"
          name="noteTitle"
          value=""
          v-model="tempTitle"
          v-if="isEditing"
          :placeholder="labels.addTitle"
          >
        </div>
        <div
        class="note-edit"
        v-if="!isEditing"
        >
          <button
          class="edit-note button"
          v-on:click.self="editNote"
          >{{labels.edit}}</button>
        </div>
      </div>

      <noteNavigation
      v-bind:class="{ editing: isEditing }"
      :contentView="contentView"
      :visibilityView="visibilityView"
      v-on:changeView="updateView"
      v-on:cancel="cancel"
      v-on:saveNote="saveNote"
      v-on:delete="removeNote"
      :labels="labels"
      ></noteNavigation>

      <noteContent
        v-bind:class="{ open: isOpen, edit: isEditing  }"
        :open="isOpen"
        :note="note"
        :editing="isEditing"
        :contentView="contentView"
        :tempContent.sync="tempContent"
        @input="tempContent = $event"
        v-if="contentView"
        :labels="labels"
      ></noteContent>

      <noteVisibility
        v-if="visibilityView"
        :note="note"
        @allVisUpdate="allVisUpdate"
        :tempAllVisibility.sync="tempAllVisibility"
        @singularVisUpdate="singularVisUpdate"
        :tempSingularVisibility.sync="tempSingularVisibility"
        @roleVisUpdate="roleVisUpdate"
        :tempRoleVisibility.sync="tempRoleVisibility"
        @roleUpdate="tempRole = $event"
        :tempRole.sync="tempRole"
        :labels="labels"
      ></noteVisibility>

    </div>
  </li>
</template>

<script>
import noteNavigation from './note-navigation.vue'
import noteContent from './note-content.vue'
import noteVisibility from './note-visibility.vue'

import Api from './../api/api.js'
  export default {
      name: 'Note',
      components: {
        noteNavigation,
        noteContent,
        noteVisibility
      },
      props: ['note', 'labels'],
      data: function () {
        return {
          tempTitle: '',
          content: '',
          isOpen: false,
          isEditing: false,
          contentView: true,
          visibilityView: false,
          tempContent: '',
          tempAllVisibility: false,
          tempSingularVisibility: false,
          tempRoleVisibility: false,
          tempRole: ''

        }
      },
      methods: {
        openNote: function () {
          if (this.isEditing) {
            return
          }
          this.isOpen = !this.isOpen
          this.contentView = true
        },
        editNote: function () {

          this.isEditing = !this.isEditing
          this.isOpen = false
          this.syncTempSettings()
        },
        updateView: function (page) {
          if (page == 'content') {
            this.visibilityView = false
            this.contentView = true

          }
          if (page == 'visibility') {
            this.visibilityView = true
            this.contentView = false
          }
        },
        cancel: function () {
          this.resetTempSettings()

          this.isEditing = false
          this.isOpen = false
          this.visibilityView = false
          this.contentView = true
        },
        saveNote: function () {

          let updatedNote = this.prepSave()

          this.$emit('update', updatedNote)

          Api.saveNote(updatedNote)
          .then(
            response => {
               if (response.data.response) {
                this.$emit('update', response.data.note)
                this.isOpen = false
                this.isEditing = false
                this.visibilityView = false
                this.contentView = true
              }
            })
          .catch( error => {
            console.log( 'there was an error', error.response )
          })
        },
        prepSave: function() {
          let updatedNote = {
            title: this.title,
            content: this.tempContent,
            id: this.note.id,
            sharedVisibility: this.tempAllVisibility,
            singleVisibility: this.tempSingularVisibility,
            roleVisibility: this.tempRoleVisibility,
            selectedRole: this.tempRole,
            title: this.tempTitle,
            ownerID: this.note.ownerID
          }
          return updatedNote;
        },
        removeNote: function() {
          this.$emit('delete', this.note);

        },
        allVisUpdate: function($event) {
          let updateNote = this.note
          updateNote.sharedVisibility = $event
          this.$emit( 'allVisUpdate', updateNote  )
        },
        syncTempSettings: function() {
          this.tempContent = this.note.content
          this.tempTitle = this.note.title
          this.tempAllVisibility = this.note.sharedVisibility
          this.tempSingularVisibility = this.note.singleVisibility
          this.tempRoleVisibility = this.note.roleVisibility
          this.tempRole = this.note.selectedRole
          if ( this.note.hasOwnProperty('newNote') ) {
            this.isEditing = true
          }

        },
        resetTempSettings: function() {
          this.tempContent = ''
          this.tempAllVisibility = false
          this.tempSingularVisibility = false
          this.tempRoleVisibility = false
          this.tempRole = null
        },
        roleVisUpdate: function(val) {
          this.tempRoleVisibility = val
          if (this.tempRoleVisibility) {
            this.tempAllVisibility = false
          }
          if (this.tempRoleVisibility) {
            this.tempSingularVisibility = false
          }
        },
        singularVisUpdate: function(val) {

          this.tempSingularVisibility = val
          if (this.tempSingularVisibility) {
            this.tempAllVisibility = false
          }
          if (this.tempSingularVisibility) {
            this.tempRoleVisibility = false
            this.tempRole = ''
          }
        },
        allVisUpdate: function(val) {
          this.tempAllVisibility = val
          if (this.tempAllVisibility) {
            this.tempRoleVisibility = false
            this.tempRole = ''
          }
          if (this.tempAllVisibility) {
            this.tempSingularVisibility = false
          }
        }

      },
      created: function () {
        this.syncTempSettings()
      }
  }
</script>

<style>

</style>
