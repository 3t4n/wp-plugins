import React, { useEffect, useState } from 'react';
import { useSelector, useDispatch } from 'react-redux';
import { Box } from '@material-ui/core';
import { Alert as MUIAlert } from '@material-ui/lab';
import { changeAlert } from '../redux/actions/global.actions';

const Alert = () => {
  const dispatch = useDispatch();
  const {alert} = useSelector((state) => state.global);
  const [open, setOpen] = useState(false);

  const handleClose = () => {
    setOpen(false);
    dispatch(changeAlert({severity: '', message: ''}));
  };

  useEffect(() => {
    if (alert.severity && alert.message) setOpen(true);
  }, [alert]);

  return (
    open
      ? (
        <Box mb={4}>
          <MUIAlert severity={alert.severity} onClose={handleClose}>
            {alert.message}
          </MUIAlert>
        </Box>
      )
      : <></>
  );
}

export default Alert;
