
import thunk from 'redux-thunk';
import { createLogger } from 'redux-logger';
import { createStore, applyMiddleware } from 'redux';

import { reducerFactory } from './reducer';

function initStore() {
  const middleware = applyMiddleware(thunk, createLogger());
  const store = createStore(reducerFactory(), middleware);

  return store;
}

export default initStore;
