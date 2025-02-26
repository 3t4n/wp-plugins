import React, { useState } from 'react';
import { useSelector } from 'react-redux';
import { useSnackbar } from 'notistack';
import {
  FormControl,
  Button,
  Select,
  Grid,
  TextField,
  Box,
  InputLabel,
} from '@material-ui/core';
import FormSection from '../../../components/FormSection';
import FormSubSection from '../../../components/FormSubSection';
import { WPRequest } from '../../../http-common';

const SettingsGeneralSectionRedirect = () => {
  const {plugin} = useSelector((state) => state.global);
  const {enqueueSnackbar} = useSnackbar();
  const [processing, setProcessing] = useState(false);
  const [option, setOption] = useState(() => plugin.options.donatiosUrlType || '');
  const [donationsUrl, setDonationUrl] = useState(() => plugin.options.donatiosUrl || '');
  const [donationsPage, setDonationPage] = useState(() => plugin.options.donatiosPage || '');

  const handleSubmit = async (event) => {
    event.preventDefault();

    setProcessing(true);
    try {
      const res = await WPRequest({
        action: 'dydo_save_donations_url_type',
        donationsUrl,
        donationsPage,
        donatiosUrlType: option,
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
    <>
      <FormSection title="Redirect">
        <FormSubSection
          title="Donation - Thanks Screen"
          description="From this option you can configure the page where users will be redirected after making a donation."
        >
          <Grid container spacing={3}>
            <Grid item md={4}>
              <FormControl variant="outlined" fullWidth>
                <InputLabel htmlFor="option">Option</InputLabel>
                <Select
                  native
                  value={option}
                  label="Option"
                  inputProps={{
                    name: 'option',
                    id: 'option',
                  }}
                  onChange={(event) => setOption(event.target.value)}
                  disabled={processing}
                >
                  <option value="page">By static page</option>
                  <option value="url">By URL</option>
                </Select>
              </FormControl>
            </Grid>
            <Grid item md={8}>
              {
                option === 'page' && (
                  <FormControl variant="outlined" fullWidth>
                    <InputLabel htmlFor="page">Pages</InputLabel>
                    <Select
                      native
                      value={donationsPage}
                      label="Page"
                      inputProps={{
                        name: 'defaultCurrency',
                        id: 'page',
                      }}
                      onChange={(event) => setDonationPage(event.target.value)}
                      disabled={processing}
                    >
                      {
                        plugin.options.pages.map((page) => (
                          <option key={page.ID} value={page.ID}>{page.post_title}</option>
                        ))
                      }
                    </Select>
                  </FormControl>
                )
              }
              {
                option === 'url' && (
                  <TextField
                    name="url"
                    id="url"
                    label="URL"
                    fullWidth
                    variant="outlined"
                    value={donationsUrl}
                    placeholder="https://domain.com/my-account"
                    onChange={(event) => setDonationUrl(event.target.value)}
                    disabled={processing}
                  />
                )
              }
            </Grid>
          </Grid>
        </FormSubSection>
        <Box p={2}>
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
      </FormSection>
    </>
  );
}

export default SettingsGeneralSectionRedirect;
