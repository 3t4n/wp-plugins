
import { Provider } from 'react-redux';
import React, { Component } from 'react';
import { MemoryRouter } from 'react-router-dom';

import Mediator from './components/mediator';
import './App.scss';

import initStore from './store';

const store = initStore();

class App extends Component {
  render() {
    return (
      <div className="wp-calconic-app">
        <Provider store={store}>
          <MemoryRouter>
            <Mediator />
          </MemoryRouter>
        </Provider>
      </div>
    );
  }
}

export default App;
