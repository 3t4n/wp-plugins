import React from 'react';
import {
  Grid,
} from '@material-ui/core';
import {Layout} from '../../layouts';
import StripeSectionCredentials from './components/StripeSectionCredentials';
import StripeSectionEnable from './components/StripeSectionEnable';
import StripeSectionAside from './components/StripeSectionAside';
import StripeSectionSync from './components/StripeSectionSync';

const Stripe = () => (
  <Layout title="Payment Gateway - Stripe">
    <Grid container spacing={3}>
      <Grid item xs={12} md={8}>
        <StripeSectionCredentials />
        <StripeSectionEnable />
        <StripeSectionSync />
      </Grid>
      <Grid item xs={12} md={4}>
        <StripeSectionAside />
      </Grid>
    </Grid>
  </Layout>
);

export default Stripe;
