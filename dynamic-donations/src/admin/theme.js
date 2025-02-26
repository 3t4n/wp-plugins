import { createTheme } from '@material-ui/core/styles'
import { green } from '@material-ui/core/colors';

const titleColor = '#233354'
const textColor = '#9098a9'

const theme = createTheme({
  palette: {
    primary: {
      light: '#6fa3ff',
      main: '#1975ff',
      dark: '#004bcb',
      contrastText: '#fff',
    },
    warning: {
      main: '#e65100'
    }
  },
  typography: {
    h1: {
      color: titleColor
    },
    h2: {
      color: titleColor
    },
    h3: {
      color: titleColor
    },
    h4: {
      color: titleColor
    },
    h5: {
      color: titleColor
    },
    h6: {
      color: titleColor
    },
    subtitle1: {
      color: titleColor
    },
    subtitle2: {
      color: titleColor
    },
    body1: {
      color: textColor
    },
    body2: {
      color: textColor
    },
  }
});

export default theme;
