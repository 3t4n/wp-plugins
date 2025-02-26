import { Switch} from '@material-ui/core';
import { withStyles} from '@material-ui/core';
import { green } from '@material-ui/core/colors';

const GreenSwitch = withStyles({
  switchBase: {
    '&$checked': {
      color: green[500],
    },
    '&$checked + $track': {
      backgroundColor: green[500],
    },
  },
  checked: {},
  track: {},
})(Switch);

export default GreenSwitch;
