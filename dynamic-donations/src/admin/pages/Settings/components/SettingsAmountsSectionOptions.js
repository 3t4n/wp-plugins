import React, { useState } from 'react';
import { useSelector } from 'react-redux';
import { useSnackbar } from 'notistack';
import { Box, Button, TextField, Grid, Checkbox, Radio, Typography, FormControlLabel } from '@material-ui/core';
import FormSubSection from '../../../components/FormSubSection';
import FormSection from '../../../components/FormSection';
import { WPRequest } from '../../../http-common';

const SettingsParagraphsSectionButtons = () => {
  const {plugin} = useSelector((state) => state.global);
  const {enqueueSnackbar} = useSnackbar();
  const [processing, setProcessing] = useState(false);
  const [amounts, setAmounts] = useState(plugin.options.amounts);

  const handleChecked = (index) => {
    const amountsUpdated = amounts.map((item, i) => {
      item.amount_checked = i === index;

      return item;
    });

    setAmounts(amountsUpdated);
  }

  const handleChange = (index, name, value) => {
    const amountsUpdated = amounts.map((item, i) => {
      i === index ? item[name] = value : null;

      return item;
    });

    setAmounts(amountsUpdated);
  }

  const handleSubmit = async (event) => {
    event.preventDefault();
    setProcessing(true);
    try {
      const res = await WPRequest({
        action: 'dydo_save_amounts',
        amounts: JSON.stringify(amounts),
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
    <FormSection
      title="Options"
      description="From this section you can configure the default amounts and the amount selected by default and you can also establish which amounts can be displayed"
    >
      {
        amounts.map((item, index) => (
          <FormSubSection key={index}>
            <Grid container spacing={3} alignItems="center">
              <Grid item md={6} lg={3}>
                <Typography variant={'subtitle1'}>{item.title}</Typography>
              </Grid>
              <Grid item md={6} lg={3}>
                <FormControlLabel
                  label="Default"
                  control={
                    <Radio
                      value={item.name}
                      name="defualt"
                      color="primary"
                      checked={item.amount_checked}
                      onChange={(event) => handleChecked(index)}
                      disabled={processing}
                    />
                  }
                />
              </Grid>
              <Grid item md={6} lg={3}>
                <FormControlLabel
                  label="Enable"
                  control={
                    <Checkbox
                      name="enable"
                      checked={item.enabled}
                      onChange={(event) => handleChange(index, 'enabled', event.target.checked)}
                      disabled={processing}
                    />
                  }
                />
              </Grid>
              <Grid item md={6} lg={3}>
                <TextField
                  type="number"
                  name="amount"
                  label="$ Amount"
                  variant="outlined"
                  value={item.amount}
                  onChange={(event) => handleChange(index, 'amount', event.target.value)}
                  fullWidth
                  disabled={processing}
                />
              </Grid>
            </Grid>
          </FormSubSection>
        ))
      }
      <Box p={2}>
        <Button
          type="submit"
          variant="contained"
          color="primary"
          onClick={handleSubmit}
          disabled={processing}
        >
          save
        </Button>
      </Box>
    </FormSection>
  );
}

export default SettingsParagraphsSectionButtons;
