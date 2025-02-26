import { createStore, applyMiddleware, compose } from 'redux';
import thunk from 'redux-thunk';

import reducers from '../reducers';

let store;
const enhancer = window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__();

if (!enhancer || ENV === 'production') {
	console.warn('Install Redux DevTools Extension to inspect the app state');

	// Store
	store = createStore(
		reducers,
		compose(applyMiddleware(thunk)),
	);
} else {
	// Store
	store = createStore(
		reducers,
		compose(applyMiddleware(thunk), enhancer),
	);
}

export default store;