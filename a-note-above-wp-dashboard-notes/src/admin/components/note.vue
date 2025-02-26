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
          <transition name="slide-fade">
            <h3
            v-on:click.self="openNote"
            v-if="!isEditing"
            >
            {{note.title}}</h3>
        </transition>
        <transition name="slide-fade">
          <input
          type="text"
          name="noteTitle"
          value=""
          v-model="tempTitle"
          v-if="isEditing"
          :placeholder="labels.addTitle"
          >
        </transition>

        </div>
        <transition name="slide-fade">
          <div
          class="note-edit"
          v-if="!isEditing"
          >
            <button
            class="edit-note button"
            v-on:click.self="editNote"
            >{{labels.edit}}</button>
          </div>
        </transition>
      </div>
      <transition name="slide-fade">
        <noteNavigation
        v-if="isEditing"
        v-bind:class="{ editing: isEditing }"
        :contentView="contentView"
        :visibilityView="visibilityView"
        :tagView="tagView"

        v-on:changeView="updateView"
        v-on:cancel="cancel"
        v-on:saveNote="saveNote"
        v-on:delete="removeNote"
        :labels="labels"
        ></noteNavigation>
      </transition>

      <transition name="slide-fade">
        <noteContent
          v-if="contentView"
          v-bind:class="{ open: isOpen, edit: isEditing  }"
          :open="isOpen"
          :note="note"
          :editing="isEditing"
          :contentView="contentView"
          :tempContent.sync="tempContent"
          :labels="labels"
          @input="tempContent = $event"
        ></noteContent>
      </transition>
      <transition name="slide-fade">
        <noteVisibility
          v-if="visibilityView"
          :note="note"
          @allVisUpdate="allVisUpdate"
          :tempAllVisibility.sync="tempAllVisibility"
          @singularVisUpdate="singularVisUpdate"
          :tempSingularVisibility.sync="tempSingularVisibility"
          @roleVisUpdate="roleVisUpdate"
          :tempRoleVisibility.sync="tempRoleVisibility"
          @roleUpdate="roleUpdate"
          :tempRole.sync="tempRole"
          :labels="labels"
        ></noteVisibility>
      </transition>
      <transition name="slide-fade">
        <noteTags
          v-if="tagView"
          :note="note"
          @addTag="addTag"
          @removeTag="removeTag"
          @tagSearch="tagSearch"
          :labels="labels"
          :tempTags.sync="tempTags"
          :editing="isEditing"
          :tagView="tagView"
          :tagQuery="tagQuery"
        ></noteTags>
      </transition>
      <transition name="slide-fade">
        <noteSubmit
        v-if="isEditing"
        :labels="labels"
        @saveNote="saveNote"
        >
        </noteSubmit>
      </transition>

    </div>
  </li>
</template>

<script>
import noteNavigation from './note-navigation.vue'
import noteContent from './note-content.vue'
import noteVisibility from './note-visibility.vue'
import noteTags from './note-tags.vue'
import noteSubmit from './note-submit.vue'
import sanitizeHtml from 'sanitize-html';

import Api from './../api/api.js'
  export default {
      name: 'Note',
      components: {
        noteNavigation,
        noteContent,
        noteVisibility,
        noteTags,
        noteSubmit
      },
      props: [
        'note',
        'labels',
        'tagQuery'
      ],
      data: function () {
        return {
          tempTitle: '',
          content: '',
          isOpen: false,
          isEditing: false,
          contentView: true,
          tagView: true,
          visibilityView: false,
          tempContent: '',
          tempTags: '',
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
          this.tagView = false
          this.contentView = true
          this.syncTempSettings()
        },
        updateView: function (page) {
          if (page == 'content') {
            this.visibilityView = false
            this.contentView = true
            this.tagView = false

          }
          if (page == 'visibility') {
            this.visibilityView = true
            this.contentView = false
            this.tagView = false

          }
          if (page == 'tags') {
            this.visibilityView = false
            this.contentView = false
            this.tagView = true
          }
        },
        cancel: function () {
          this.resetTempSettings()

          this.isEditing = false
          this.isOpen = false
          this.visibilityView = false
          this.tagView = true
          this.contentView = true
        },
        addTag: function(tag) {
          const clean = sanitizeHtml(tag);
          if (clean) {
            var decoded = clean.replace(/&amp;/g, '&').replace(/&lt;|&gt;|´|∑|¨|≈|∂|ß|ƒ|©|§|¶|•|ª/g, '');
            this.tempTags.push(decoded)
          }
        },
        saveNote: function () {
          let updatedNote = this.prepSave()

          this.$emit('update', updatedNote)

          Api.saveNote(updatedNote)
          .then(
            response => {
               if (response.data.response) {
                this.$store.dispatch('SAVE_NOTE', response.data.note)
                this.isOpen = false
                this.isEditing = false
                this.visibilityView = false
                this.contentView = true
                this.tagView = true
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
            ownerID: this.note.ownerID,
            tags: this.tempTags
          }
          return updatedNote;
        },
        removeNote: function() {
          this.$emit('delete', this.note);
          // Enable when ready to enable Store
          this.$store.dispatch('DELETE_NOTE', this.note)

        },
        allVisUpdate: function($event) {
          let updateNote = this.note
          updateNote.sharedVisibility = $event
          this.$emit( 'allVisUpdate', updateNote  )
        },
        syncTempSettings: function() {
          this.tempContent = this.note.content
          this.tempTags = this.note.tags
          this.tempTitle = this.note.title
          this.tempAllVisibility = this.note.sharedVisibility
          this.tempSingularVisibility = this.note.singleVisibility
          this.tempRoleVisibility = this.note.roleVisibility
          this.tempRole = this.note.selectedRole
          //


          if ( this.note.hasOwnProperty('newNote') ) {
            this.isEditing = true
          }

        },
        resetTempSettings: function() {
          this.tempContent = ''
          this.tempTags = ''
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
        },
        roleUpdate: function(val) {
          this.tempRole = val
          if (this.tempAllVisibility) {
            this.tempAllVisibility = false
          }
          if (!this.tempRoleVisibility) {
            this.tempRoleVisibility = true
          }
          if (this.tempSingularVisibility) {
            this.tempSingularVisibility = false
          }
        },
        removeTag(index) {
          this.tempTags.splice(index, 1)
        },
        tagSearch(tag) {
          this.$emit('tagSearch', tag)
        }

      },
      created: function () {
        this.syncTempSettings()
      }
  }
</script>

<style>
/* Enter and leave animations can use different */
/* durations and timing functions.              */
.slide-fade-enter-active {
  transition: all .8s ease;
}
.slide-fade-leave-active {
  transition: all 0;
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}
</style>
