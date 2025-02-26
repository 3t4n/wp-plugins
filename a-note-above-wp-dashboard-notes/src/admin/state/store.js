import Vue from 'vue'
import Vuex from 'vuex'
import Api from './../api/api.js'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    labels: {},
    notes: [],
    addNoteLable: _anoteabove.labels.addNote,
    labels: _anoteabove.labels,
    isLoading: false
  },
  mutations: {
    SET_NOTES: (state, notes) => {
      state.isLoading = false
      state.notes = notes
    },
    NEW_NOTE: ( state, notes ) => {
      state.notes.unshift(notes)
    },
    DELETE_NOTE: ( state, note ) => {
      for (var i = 0; i < state.notes.length; i++) {
        if ( note.id === state.notes[i].id ) {
          let removed = state.notes.splice([i], 1 )
        }

      }
    },
    SAVE_NOTE: ( state, note ) => {
      for (var i = 0; i < state.notes.length; i++) {
        if ( note.id == state.notes[i].id ) {
          state.notes[i].content = note.content
          state.notes[i].title = note.title
          state.notes[i].roleVisibility = note.roleVisibility
          state.notes[i].selectedRole = note.selectedRole
          state.notes[i].sharedVisibility = note.sharedVisibility
          state.notes[i].singleVisibility = note.singleVisibility
        }
      }
    },
    SEARCH_TAG: ( state, notes ) =>  {
      state.notes = notes
    }
  },
  actions: {
    SET_NOTES: ({ commit }) => {
      Api.getNotes()
      .then(
        response => {
          commit( "SET_NOTES", response.data )
        })
      .catch( error => {
        console.log( 'there was an error', error.response )
      })
    },
    NEW_NOTE: ({commit}) => {
      Api.newNote()
      .then(
        response => {
          this.notes.unshift(response.data)
        })
      .catch( error => {
        console.log( 'there was an error', error.response )
      })
    },
    DELETE_NOTE: ({commit}, note) => {
      // Temporary Untill we activate the store
      commit('DELETE_NOTE', note)
      // Uncomment to activate store
      // Api.deleteNote(note)
      // .then(
      //   response => {
      //     commit('DELETE_NOTE', response.data.note)
      //   })
      // .catch( error => {
      //   console.log( 'there was an error', error.response )
      // })
    },
    SAVE_NOTE: ({commit}, note) => {
      commit('SAVE_NOTE', note)
    },
    SEARCH_TAG: ({commit}, tag) =>  {
      Api.tagSearch(tag)
      .then(
        response => {
          commit('SEARCH_TAG', response.data.search_results);
        })
      .catch( error => {
        console.log( 'there was an error', error )
      })
    }
  },
  getters: {
    NOTES: state => {
      return state.notes
    }
  }
})
