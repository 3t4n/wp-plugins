<template>
  <div id="anoteabove-dash">
    <div id="note-control">
      <div class="note-tag-search-container">
        <form v-on:submit.prevent="tagSearch">
          <div class="search_input_container">
            <input
            type="text"
            placeholder="Search Notes By Tag"
            v-model="tagQuery"
            class="tagSearchInput"
            >
            <input
            v-if="tagQuery"
            type="reset"
            value="X"
            class="reset"
            @click="clearTagSearch"
            >
          </div>

          <input
          type="submit"
          name=""
          value="Search Tags"
          class="button"
          >
        </form>
      </div>
      <button
      id="new-note"
      class="button"
      v-on:click="newNote">
        <span aria-hidden="true" class="dashicons dashicons-plus"></span>{{addNoteLable}}
      </button>
    </div>
    <div id="note-portfolio">
      <span class="subtext">Notes</span>
      <div class="loading-container"
      v-if="isLoading">
      </div>
      <ul
      v-if="!isLoading"
        >
        <li v-if="storeNotes.length == 0" >Start by clicking 'Add A Note'</li>
        <transition-group name="fade">
          <Note
    			v-for="note in storeNotes"
      		:key="note.id"
          :labels="labels"
          v-bind:note="note"
          v-on:delete="removeNote"
          :tagQuery="tagQuery"
          @update="update_current_note"
          @tagSearch="tagSearchClick"
          ></Note>
        </transition-group>
      </ul>
    </div>
  </div>
</template>

<script>
import Api from './api/api.js'
import Note from './components/note.vue'
import { mapGetters } from 'vuex'

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
      labels: _anoteabove.labels,
      tagQuery: '',
      isLoading: false,
    }
  },
  methods: {
    tagSearchClick: function(tag) {
      this.tagQuery = tag
      this.tagSearch()
    },
    tagSearch: function() {
      let parcel = {
        query: this.tagQuery
      }

      this.$store.dispatch( 'SEARCH_TAG', parcel );

    },
    clearTagSearch: function(){
      if ('' != this.tagQuery) {
        this.tagQuery = '';
        let parcel = {
          query: this.tagQuery
        }

        this.$store.dispatch( 'SEARCH_TAG', parcel );
      }
    },
    newNote: function () {

      // Depreicated - Remove api call when ready to activate store
      Api.newNote()
      .then(
        response => {
          this.notes.unshift(response.data)

          this.$store.commit( 'NEW_NOTE', response.data )
        })
      .catch( error => {
        console.log( 'there was an error', error.response )
      })
      // End of depricated api call

      // Activate on removal of api.newNote
      // this.$store.dispatch( 'NEW_NOTE' );

    },
    removeNote(note) {
      let confirmDelete = confirm( 'Are you sure you want to delete this note?' );

      if (confirmDelete) {
        // Begin - Depricated API Call -
        Api.deleteNote(note)
        .then(
          response => {
            this.emptyTrash(response.data.note)
          })
        .catch( error => {
          console.log( 'there was an error', error.response )
        })
        // End Depricated API Call

        // Remove Note Functionality Moved to Actions
        //
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
      this.$store.getters.NOTES()
    }
  },
  created: function() {
    this.isLoading = true
    this.$store.dispatch( 'SET_NOTES' )
    .then(() =>
      this.isLoading = false
    )
  },
  computed: {
    ...mapGetters({
      storeNotes: 'NOTES'
    })
  }
}
</script>

<style>

#new-note span.dashicons.dashicons-plus {
    vertical-align: middle;
}

.note-header, .edit-nav, .save-delete, .content-visibility {
    display: flex;
    flex-flow: row wrap;

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
    margin-top: 5px;
    font-weight: 800;
    letter-spacing: 0.1px;
    display: block;
    text-transform: uppercase;
    margin-bottom: 8px;
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

ul.content-visibility li {
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
div#note-control {
  display: flex;
  gap: 10px;

}

#new-note {
  height: 30px;
  margin: auto;
  margin-top: 0;
}

#note-control input[type="submit"] {
    min-height: 30px;
    flex: 1;
    max-width: 110px;
}
.note-tag-search-container {
    flex: 35;
}

button#new-note {flex: 1 auto;}

.note-tag-search-container .search_input_container {
    flex: 4 0px;
    flex-wrap: wrap;
    gap: 12px;
}
.search_input_container input[type="text"] {
    flex: 4 0px;
}

.reset{
    margin-left: -30px;
    cursor: pointer;
}

form {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
}

.search-tags {
  width: 100%;
}

p.subtext {
    width: 100%;
}

#note-portfolio ul {
    margin-top: 1px;
}
.search_input_container {
    display: flex;
}
.subtext.search-tags {

    margin: 0;
}

.loading-container {
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid #3498db; /* Blue */
  border-radius: 50%;
  width: 120px;
  height: 120px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.fade-enter-active, .fade-leave-active {
  transition: opacity .8s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>
