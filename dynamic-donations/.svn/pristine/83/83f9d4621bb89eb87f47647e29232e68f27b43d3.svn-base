import React, { useState } from 'react';
import { useSelector } from 'react-redux';
import { useSnackbar } from 'notistack';
import {
  Grid,
  Typography,
  Box,
} from '@material-ui/core';
import FormSubSection from '../../../components/FormSubSection';
import GreenSwitch from '../../../components/GreenSwitch';
import { WPRequest } from '../../../http-common';

const SettingsGeneralSectionCurrenciesEnable = () => {
  const {plugin} = useSelector((state) => state.global);
  const { enqueueSnackbar } = useSnackbar();
  const [processing, setProcessing] = useState(false);
  const [showCurrencies, setShowCurrencies] = useState(plugin.options.showCurrencies);

  const toggleChecked = async () => {
    setShowCurrencies(!showCurrencies);

    setProcessing(true);
    try {
      const res = await WPRequest({
        action: 'dydo_save_show_currencies',
        showCurrencies: !showCurrencies
      });

      if (res.success) {
        enqueueSnackbar('Your changes have been saved', {variant: 'success'});
      } else {
        enqueueSnackbar(res.data, {variant: 'error'});
      }
    } catch (e) {
      enqueueSnackbar(e, {variant: 'error'});
    }
    setProcessing(false);
  }

  return (
    <FormSubSection>
      <Grid container spacing={3} alignItems="center">
        <Grid item md={6}>
          <Typography variant="subtitle1">
            <Box fontWeight="fontWeightNormal">Show currencies</Box>
          </Typography>
          <Typography variant="body2">Activate the availability of currencies that customers can select when they are making a donation in the modal and can be configured from Settings > Currencies.</Typography>
        </Grid>
        <Grid item md={6}>
          <Box display="flex" justifyContent="flex-end">
            <GreenSwitch onChange={toggleChecked} value={showCurrencies} checked={showCurrencies} disabled={processing} />
          </Box>
        </Grid>
      </Grid>
    </FormSubSection>
  );
}

export default SettingsGeneralSectionCurrenciesEnable;
