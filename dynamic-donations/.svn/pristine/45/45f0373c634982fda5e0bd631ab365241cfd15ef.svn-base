import React, { useState } from 'react';
import { Box, Button, TextField } from '@material-ui/core';
import { useDispatch } from 'react-redux';
import { useHistory } from 'react-router-dom';
import { useSnackbar } from 'notistack';
import { WPRequest } from '../../http-common';
import { updateLicense } from '../../redux/actions/global.actions';

const FormLicense = () => {
  const [licensekey, setLicensekey] = useState('');
  const {enqueueSnackbar} = useSnackbar();
  const history = useHistory();
  const dispatch = useDispatch();

  const handleChange = (event) => {
    setLicensekey(event.target.value);
  }

  const handleSubmit = async (event) => {
    event.preventDefault();

    try {
      let variant = 'error';
      const res = await WPRequest({
        action: 'dydo_activate_plugin',
        key: licensekey,
      });

      if (res.success) {
        variant = 'success';
      }

      const data = JSON.parse(res.data)[0];
      // Update plugin data
      dispatch(updateLicense(data.license));

      // Push notify
      enqueueSnackbar(data.message, {variant});

      // Redirect
      history.replace('/');
    } catch (e) {
      console.log(e)
    }
  }

  return (
    <>
      <form onSubmit={handleSubmit}>
        <TextField
          onChange={handleChange}
          value={licensekey}
          label="Key"
          variant="outlined"
          color="primary"
          fullWidth
        />
        <Box mt={3}>
          <Button
            type="submit"
            variant="contained"
            color="primary"
            fullWidth
          >
            Activate
          </Button>
        </Box>
      </form>
    </>
  );
};

export default FormLicense;
