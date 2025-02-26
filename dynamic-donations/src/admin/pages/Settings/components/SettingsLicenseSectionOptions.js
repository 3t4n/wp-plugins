import React, { useState, useEffect } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { useSnackbar } from 'notistack';
import { Box, Button, TextField } from '@material-ui/core';
import FormSubSection from '../../../components/FormSubSection';
import FormSection from '../../../components/FormSection';
import { WPRequest } from '../../../http-common'
import { updateLicense } from '../../../redux/actions/global.actions';

const SettingsParagraphsSectionButtons = () => {
  const {plugin} = useSelector((state) => state.global);
  const [licensekey, setLicensekey] = useState(plugin?.license?.key);
  const {enqueueSnackbar} = useSnackbar();
  const [processing, setProcessing] = useState(false);
  const dispatch = useDispatch();

  const handleChange = (event) => {
    setLicensekey(event.target.value);
  }

  const handleSubmit = async (event) => {
    event.preventDefault();

    setProcessing(true);

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
    } catch (e) {
      enqueueSnackbar(e, {variant: 'error'});
    }

    setProcessing(false);
  }

  return (
    <FormSection
      title="Options"
    >
      <FormSubSection>
        <form onSubmit={handleSubmit}>
          <Box mb={3}>
            <TextField
              name="label"
              id="label-button"
              label="Key"
              fullWidth
              variant="outlined"
              onChange={handleChange}
              value={licensekey}
              disabled={processing}
            />
          </Box>
          <Button
            type="submit"
            variant="contained"
            color="primary"
            disabled={processing}
          >
            save
          </Button>
        </form>
      </FormSubSection>
    </FormSection>
  );
}

export default SettingsParagraphsSectionButtons;
