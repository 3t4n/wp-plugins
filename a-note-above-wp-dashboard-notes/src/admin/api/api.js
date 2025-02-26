import axios from 'axios'

const api = axios.create({
	baseURL: _anoteabove.root,
	withCredentials: true,
	headers: {
		Accept: 'application/json',
		'Content-Type': 'application/json',
		'X-WP-Nonce': _anoteabove._nonce
	}
})

export default {
	getNotes() {
		return api.get('/anoteaboves/v1/notes')
	},
	saveNote(note) {
		return api.post('/anoteaboves/v1/save_note', note)
	},
	newNote() {
		return api.get('/anoteaboves/v1/new_note')
	},
	deleteNote(note) {
		return api.post('/anoteaboves/v1/delete_note', note)
	},
	tagSearch(tag) {
		return api.post('/anoteaboves/v1/tag_search', tag)
	}
}
