import React, { useEffect } from 'react';
import { useHistory } from 'react-router-dom';
import { useSelector } from 'react-redux';
import { Container, Grid, Typography, Box } from '@material-ui/core';
import FormLicense from '../../components/Forms/FormLicense';

const LicenseExpires = () => {
  const {global} = useSelector((state) => ({global: state.global}));
  const history = useHistory();
  const licenseExpires = global?.plugin?.licenseExpires;

  useEffect(() => {
    if (licenseExpires) {
      history.replace('/');
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
            <Typography align="center" variant="h5">Your license has expired</Typography>
            <Typography align="center" variant="body1">
              To use Dynamic Donations, you must get a new key from {' '}
              <a href="https://pluginswithpurpose.com" target="_blank">here</a>
            </Typography>
          </Box>
          <FormLicense />
        </Grid>
      </Grid>
    </Container>
  );
};

export default LicenseExpires;
