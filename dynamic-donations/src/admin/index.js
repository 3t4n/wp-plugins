import ReactDOM from 'react-dom';
import React from 'react';
import { Provider } from 'react-redux';
import { ThemeProvider } from '@material-ui/core/styles';
import { Slide } from '@material-ui/core';
import { SnackbarProvider } from 'notistack';
import './reset.css';

import './config/time';
import theme from './theme';
import App from './App';
import store from './redux/store';

ReactDOM.render(
  <Provider store={store}>
    <ThemeProvider theme={theme}>
      <SnackbarProvider
        anchorOrigin={{vertical: 'bottom', horizontal: 'right',}}
        TransitionComponent={Slide}
        maxSnack={3}
      >
        <App />
      </SnackbarProvider>
    </ThemeProvider>
  </Provider>,
  document.getElementById('dydo-app'),
);
