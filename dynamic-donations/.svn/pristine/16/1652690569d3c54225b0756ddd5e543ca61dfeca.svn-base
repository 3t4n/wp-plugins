import React, { useState } from 'react';
import { useSelector } from 'react-redux';
import { useSnackbar } from 'notistack';
import { Box, Button, FormControl, FormControlLabel, FormLabel, Switch, TextField, Grid } from '@material-ui/core';
import FormSubSection from '../../../components/FormSubSection';
import FormSection from '../../../components/FormSection';
import { WPRequest } from '../../../http-common'

const SettingsParagraphsSectionScreens = () => {
  const {plugin} = useSelector((state) => state.global);
  const {enqueueSnackbar} = useSnackbar();
  const [processing, setProcessing] = useState(false);
  const [formData, setFormData] = useState({
    action: 'dydo_save_paragraphs',
    description: plugin.options.description,
    donationTypeHelperLabel: plugin.options.helperLabels.donationTypeHelperLabel,
    recurringDonationHelperLabel: plugin.options.helperLabels.recurringDonationHelperLabel,
    donationAmountHelperLabel: plugin.options.helperLabels.donationAmountHelperLabel,
    addCardHelperLabel: plugin.options.helperLabels.addCardHelperLabel,
    loginHelperLabel: plugin.options.helperLabels.loginHelperLabel,
    registerHelperLabel: plugin.options.helperLabels.registerHelperLabel,
  });

  const handleChange = (event) => {
    setFormData({
      ...formData,
      [event.target.name]: event.target.value,
    });
  }

  const handleSubmit = async (event) => {
    event.preventDefault();

    setProcessing(true);
    try {
      const res = await WPRequest(formData);

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
      title="Screens"
      description="Texts of the donation modal divided by screens"
    >
      <form onSubmit={handleSubmit} noValidate autoComplete="off">
        <FormSubSection title="Donation Screen:" description="Screen where the user can configure a donation.">
          <Box mb={3}>
            <TextField
              onChange={handleChange}
              name="description"
              id="outlined-multiline-flexible"
              label="Description"
              multiline
              fullWidth
              variant="outlined"
              value={formData.description}
              disabled={processing}
            />
          </Box>
          <Box mb={3}>
            <TextField
              onChange={handleChange}
              name="donationTypeHelperLabel"
              id="donation-type-helper-label"
              label="Label"
              multiline
              fullWidth
              variant="outlined"
              value={formData.donationTypeHelperLabel}
              disabled={processing}
            />
          </Box>
          <TextField
            onChange={handleChange}
            name="recurringDonationHelperLabel"
            id="recurrring-donation-helper-label"
            label="Label"
            multiline
            fullWidth
            variant="outlined"
            value={formData.recurringDonationHelperLabel}
            disabled={processing}
          />
        </FormSubSection>
        <FormSubSection title="Pay Screen:" description="Screen where the user can add or select a payment method and complete their donation.">
          <TextField
            onChange={handleChange}
            name="addCardHelperLabel"
            id="add-card-helper-label"
            label="Label"
            multiline
            fullWidth
            variant="outlined"
            value={formData.addCardHelperLabel}
            disabled={processing}
          />
        </FormSubSection>
        <FormSubSection title="Login Screen:" description="Screen where the user must enter email and password in order to make a donation.">
          <TextField
            onChange={handleChange}
            name="loginHelperLabel"
            id="login-helper-label"
            label="Label"
            multiline
            fullWidth
            variant="outlined"
            value={formData.loginHelperLabel}
            disabled={processing}
          />
        </FormSubSection>
        <FormSubSection title="Register Screen:" description="Screen where the user must enter their personal data in order to make donations.">
          <TextField
            onChange={handleChange}
            name="registerHelperLabel"
            id="register-helper-label"
            label="Label"
            multiline
            fullWidth
            variant="outlined"
            value={formData.registerHelperLabel}
            disabled={processing}
          />
        </FormSubSection>
        <Box p={2}>
          <Button
            type="submit"
            variant="contained"
            color="primary"
            disabled={processing}
          >
            save
          </Button>
        </Box>
      </form>
    </FormSection>
  );
}

export default SettingsParagraphsSectionScreens;
