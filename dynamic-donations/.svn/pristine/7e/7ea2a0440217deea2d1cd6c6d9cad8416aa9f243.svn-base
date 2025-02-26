import React, { useEffect, useState } from 'react';
import { useHistory } from 'react-router-dom';
import { useDispatch, useSelector } from 'react-redux';
import { useSnackbar } from 'notistack';
import { Container, Grid, Button, TextField, Box, Typography } from '@material-ui/core';
import { WPRequest } from '../../http-common';
import { updateLicense } from '../../redux/actions/global.actions';

const Activate = () => {
  const [licensekey, setLicensekey] = useState('');
  const {global} = useSelector((state) => ({ global: state.global }));
  const {enqueueSnackbar} = useSnackbar();
  const history = useHistory();
  const dispatch = useDispatch();
  const license = global?.plugin?.license;

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

      // Update plugin data
      dispatch(updateLicense(res.data.license));

      // Push notify
      enqueueSnackbar(res.data.message, {variant});

      // Redirect
      history.replace('/');
    } catch (e) {
      console.log(e)
    }
  }

  useEffect(() => {
    if (license?.key !== '' && license?.product_id !== '' && license?.installable === false) {
      history.replace('/')
    }
  }, []);

  return (
    <Container>
      <Grid
        container
        direction="row"
        justify="center"
        alignItems="center"
        style={{height: 'calc(100vh - 3rem)'}}
      >
        <Grid item xs={12} md={6} lg={4}>
          <Box mb={3}>
            <Typography align="center" variant="h5">Welcome</Typography>
            <Typography align="center" variant="body1">
              To use Dynamic Donations, before must first to get a key from {' '}
              <a href="http://staging.pluginswithpurpose.com/dynamic-donations" target="_blank">here</a>
            </Typography>
          </Box>
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
        </Grid>
      </Grid>
    </Container>
  );
};

export default Activate;
