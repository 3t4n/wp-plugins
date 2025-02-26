import React, { useState } from 'react';
import { useSelector } from 'react-redux';
import { useSnackbar } from 'notistack';
import { Box, Grid, Typography } from '@material-ui/core';
import FormSubSection from '../../../components/FormSubSection';
import FormSection from '../../../components/FormSection';
import GreenSwitch from '../../../components/GreenSwitch';
import SettingsOnlyPro  from "../../Settings/SettingsOnlyPro";
import { WPRequest } from '../../../http-common';

const StripeSectionEnable = () => {
  const {plugin} = useSelector((state) => state.global);
  const { enqueueSnackbar } = useSnackbar();
  const [enableOptions, setEnableOptions] = useState({
    recurringDonation: plugin.options.recurringDonationEnabled,
    onetimeDonation: plugin.options.onetimeDonationEnabled,
  });

  const handleChange = async (event) => {
    const enableOptionsUpdated = {
      ...enableOptions,
      [event.target.name]: event.target.checked
    };

    setEnableOptions(enableOptionsUpdated);
    await handleSubmit(enableOptionsUpdated);
  }

  const handleSubmit = async (data) => {
    try {
      const res = await WPRequest({
        action: 'dydo_save_enable_donation_types_stripe',
        ...data
      });

      if (res.success) {
        enqueueSnackbar('Your changes have been saved', {variant: 'success'});
      } else {
        enqueueSnackbar(res.data, {variant: 'error'});
      }
    } catch (e) {
      enqueueSnackbar(e, {variant: 'error'});
    }
  }

  return (
    <FormSection title="Enable">
      <SettingsOnlyPro>
        <FormSubSection>
          <Grid container spacing={3} alignItems="center">
            <Grid item md={8}>
              <Typography variant="subtitle1">
                <Box fontWeight="fontWeightNormal">Recurring</Box>
              </Typography>
              <Typography variant="body2">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</Typography>
            </Grid>
            <Grid item md={4}>
              <Box display="flex" justifyContent="flex-end">
                <GreenSwitch
                  color="default"
                  name="recurringDonation"
                  onChange={handleChange}
                  checked={enableOptions.recurringDonation}
                />
              </Box>
            </Grid>
          </Grid>
        </FormSubSection>
      </SettingsOnlyPro>
      <FormSubSection>
        <Grid container spacing={3} alignItems="center">
          <Grid item md={8}>
            <Typography variant="subtitle1">
              <Box fontWeight="fontWeightNormal">One time</Box>
            </Typography>
            <Typography variant="body2">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</Typography>
          </Grid>
          <Grid item md={4}>
            <Box display="flex" justifyContent="flex-end">
              <GreenSwitch
                name="onetimeDonation"
                onChange={handleChange}
                checked={enableOptions.onetimeDonation}
              />
            </Box>
          </Grid>
        </Grid>
      </FormSubSection>
    </FormSection>
  );
}

export default StripeSectionEnable;
