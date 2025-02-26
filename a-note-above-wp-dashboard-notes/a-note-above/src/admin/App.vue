<template>
  <div id="anoteabove-dash">
    <div id="note-control">
      <button
      id="new-note"
      class="button"
      v-on:click="newNote">
        <span aria-hidden="true" class="dashicons dashicons-plus"></span>{{addNoteLable}}
      </button>
    </div>
    <div id="note-portfolio">
      <ul>
        <li v-if="notes.count < 1" >+Add A Note</li>
        <Note
  			v-for="note in notes"
    		:key="note.id"
        :labels="labels"
        v-bind:note="note"
        v-on:delete="removeNote"
        @update="update_current_note"
        ></Note>
      </ul>
    </div>
  </div>
</template>

<script>
import Api from './api/api.js'
import Note from './components/note.vue'
export default {
  name: 'App',
  components: {
    Note
  },
  data: function () {
    return {
      notes: [
        {
          id: 1,
          title: '',
          content: '',
          sharedVisibility: true,
          singleVisibility: false,
          roleVisibility: false,
          selectedRole: null,
          ownerID: 0
        }
      ],
      addNoteLable: _anoteabove.labels.addNote,
      labels: _anoteabove.labels
    }
  },
  methods: {
    newNote: function () {

      Api.newNote()
      .then(
        response => {
          this.notes.unshift(response.data)
        })
      .catch( error => {
        console.log( 'there was an error', error.response )
      })

    },
    removeNote(note) {
      let confirmDelete = confirm( 'Are you sure you want to delete this note?' );

      if (confirmDelete) {
        Api.deleteNote(note)
        .then(
          response => {
            this.emptyTrash(response.data.note)
          })
        .catch( error => {
          console.log( 'there was an error', error.response )
        })

      }
    },
    emptyTrash(note){
      for (var i = 0; i < this.notes.length; i++) {
        if ( note.id === this.notes[i].id ) {
          let removed = this.notes.splice([i], 1 )
        }

      }
    },
    update_current_note(note) {
      for (var i = 0; i < this.notes.length; i++) {
        if ( note.id == this.notes[i].id ) {
          this.notes[i].content = note.content
          this.notes[i].title = note.title
          this.notes[i].roleVisibility = note.roleVisibility
          this.notes[i].selectedRole = note.selectedRole
          this.notes[i].sharedVisibility = note.sharedVisibility
          this.notes[i].singleVisibility = note.singleVisibility
        }
      }
    },
    loadNotes(notes) {
      this.notes = notes
    }
  },
  created: function() {
    Api.getNotes()
    .then(
      response => {
        this.loadNotes(response.data)
      })
    .catch( error => {
      console.log( 'there was an error', error.response )
    })
  }
}
</script>

<style>

#new-note span.dashicons.dashicons-plus {
    vertical-align: middle;
}

div#note-control {
    text-align: right;
}

.note-header, .edit-nav, .save-delete, .content-visibility {
    display: flex;
}

.note-header h3:hover {
    cursor: pointer;
}

.note-edit, .save-delete {
    margin-left: auto;
}

.note-container {
    border: 1px solid grey;
    padding: 8px;
}

textarea.note-content {
    width: 100%;
}
button.edit-note {
  opacity: 0;
  transition: opacity .3s;
}

.note-header:hover button.edit-note {
   opacity: 1;
}

.note-container .note-content-container {
    display: none;
}

.title-container input[type="text"] {
    width: 450px;
}

.note-container .open.note-content-container, .note-container .edit.note-content-container {
  display: block;
}

.subtext {
    font-size: 10px;
    margin-top: 0px;
    font-weight: 800;
    letter-spacing: 0.1px;
    display: block;
    text-transform: uppercase;
}

/* Note Navigation & Buttons */
.edit-note {
  text-transform: capitalize;
}
.edit-control {
  text-transform: uppercase;
}
#note-control .button {
    text-transform: capitalize;
}
.edit-navigation {
  font-size: 12px;
}
.note-edit-bar {
  display: none;
}
.note-edit-bar.editing {
  display: block;
}

.edit-control.button {
    font-size: 11px;
    min-height: 22px;

}

.button.delete {
    color: red;
    border-color: red;
}

.button.save {
    color: green;
    border-color: green;
}

ul.content-visibility li:nth-child(1) {
    padding-right: 6px;
}

ul.save-delete li {
    padding-right: 6px;
}

ul.save-delete li:last-child {
    padding-right: 0px;
}

.current-setting {
  font-weight: 700;
  background: rgb(201 204 206 / 59%);
}

.note-header {
    display: -webkit-box; /* OLD - iOS 6-, Safari 3.1-6 */
    display: -moz-box; /* OLD - Firefox 19- (buggy but mostly works) */
    display: -ms-flexbox; /* TWEENER - IE 10 */
    display: -webkit-flex; /* NEW - Chrome */
    display: flex; /* NEW, Spec - Opera 12.1, Firefox 20+ */
    align-items: center;
    width: 100%;
}

.title-container {
    -webkit-box-flex: 2; /* OLD - iOS 6-, Safari 3.1-6 */
    -moz-box-flex: 2; /* OLD - Firefox 19- */
    -webkit-flex: 2; /* Chrome */
    -ms-flex: 2; /* IE 10 */
    flex: 2; /* NEW, */
    margin-right: 4px;
}

.title-container input[type="text"] {
    display: block;
    width: 100%;
}
.title-container input[type="text"]::placeholder {
    text-transform:capitalize;
}
</style>
