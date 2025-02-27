import React from 'react';
import ReactDOM from 'react-dom';
import App from './App';
import registerServiceWorker from './registerServiceWorker';

if (process.env.NODE_ENV === 'development') {
  ReactDOM.render(<App />, document.getElementById('root'));
  registerServiceWorker();
} else {
  const wpCalconicNode = document.getElementById('wp-calconic-core');

  if (wpCalconicNode) {
    ReactDOM.render(<App />, wpCalconicNode);
  }
}
