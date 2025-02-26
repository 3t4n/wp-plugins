import React, { useState } from 'react';
import { useSelector, useDispatch } from 'react-redux';
import { useSnackbar } from 'notistack';
import { Box, Button, Grid, TextField } from '@material-ui/core';
import FormSubSection from '../../../components/FormSubSection';
import FormSection from '../../../components/FormSection';
import { WPRequest } from '../../../http-common';
import { updatePluginData } from '../../../redux/actions/global.actions';

const StripeSectionCredentials = () => {
  const {plugin} = useSelector((state) => state.global);
  const dispatch = useDispatch();
  const { enqueueSnackbar } = useSnackbar();
  const [processing, setProcessing] = useState(false);
  const [stripeCredentials, setStripeCredentials] = useState({
    pk: plugin.options.stripePK,
    sk: plugin.options.stripeSK
  });

  const handleChange = (event) => {
    setStripeCredentials({
      ...stripeCredentials,
      [event.target.name]: event.target.value
    });
  }

  const handleSubmit = async (event) => {
    event.preventDefault();

    setProcessing(true);
    try {
      let res = await WPRequest({
        action: 'dydo_save_stripe_credentials',
        ...stripeCredentials
      });

      if (res.success) {
        dispatch(updatePluginData({
          ...plugin,
          options: {
            ...plugin.options,
            ...res.data,
          }
        }));
        enqueueSnackbar('Your changes have been saved', {variant: 'success'});
        res = await WPRequest({
          action: 'dydo_create_webhook',
          createWebhook:true
        });
  
        if (res.success) {
          enqueueSnackbar('Webhook has been created', {variant: 'success'});
        } else {
          enqueueSnackbar(res.data, {variant: 'error'});
        }
      } else {
        enqueueSnackbar(res.data, {variant: 'error'});
      }
    } catch (e) {
      enqueueSnackbar(e, {variant: 'error'});
    }
    setProcessing(false);

    setTimeout(() => {
      if (stripeCredentials.pk === '' || stripeCredentials.sk === '') {
        enqueueSnackbar('Missing stripe credentials', {variant: 'error'});
      }
    }, 500);
  }

  const handleCheckCredentials = async (event) => {
    event.preventDefault();

    setProcessing(true);
    try {
      const res = await WPRequest({
        action: 'dydo_check_stripe_credentials'
      });

      if (res.success) {
        enqueueSnackbar(res.data, {variant: 'success'});
      } else {
        enqueueSnackbar(res.data, {variant: 'error'});
      }
    } catch (e) {
      enqueueSnackbar(e, {variant: 'error'});
    }
    setProcessing(false);
  }

  return (
    <FormSection title="Credentials">
      <FormSubSection>
        <Box mb={3}>
          <TextField
            name="pk"
            id="outlined-multiline-flexible"
            label="Stripe – Publishable key:"
            fullWidth
            variant="outlined"
            value={stripeCredentials.pk}
            onChange={handleChange}
            disabled={processing}
          />
        </Box>
        <Box>
          <TextField
            name="sk"
            id="outlined-multiline-flexible"
            label="Stripe – Secret key:"
            fullWidth
            variant="outlined"
            value={stripeCredentials.sk}
            onChange={handleChange}
            type="password"
            disabled={processing}
          />
        </Box>
      </FormSubSection>
      <Box p={2}>
        <Grid container spacing={3}>
          <Grid item md={6}>
            <Button
              type="submit"
              variant="outlined"
              color="primary"
              onClick={handleCheckCredentials}
              disabled={processing}
            >
              Check Credentials
            </Button>
          </Grid>
          <Grid item md={6}>
            <Box display="flex" justifyContent="flex-end">
              <Button
                type="submit"
                variant="contained"
                color="primary"
                onClick={handleSubmit}
                disabled={processing}
              >
                Save
              </Button>
            </Box>
          </Grid>
        </Grid>
      </Box>
    </FormSection>
  );
}

export default StripeSectionCredentials;
