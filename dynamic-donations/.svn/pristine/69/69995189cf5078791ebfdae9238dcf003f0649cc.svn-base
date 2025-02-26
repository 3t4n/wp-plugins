import React, { useState, useRef, useEffect } from 'react';
import { useSelector } from 'react-redux';
import { useSnackbar } from 'notistack';
import {
  FormControl,
  Button,
  Select,
  MenuItem,
  Checkbox,
  ListItemText,
  Grid,
  Paper,
  Chip,
  Box,
  InputLabel
} from '@material-ui/core';
import { makeStyles } from '@material-ui/core';
import FormSection from '../../../components/FormSection';
import FormSubSection from '../../../components/FormSubSection';
import { WPRequest } from '../../../http-common';

const useStyles = makeStyles((theme) => ({
  currencies: {
    display: 'flex',
    justifyContent: 'center',
    flexWrap: 'wrap',
    listStyle: 'none',
    padding: theme.spacing(0.5),
    margin: 0,
    boxShadow: 'none',
    border: '1px solid rgba(0, 0, 0, 0.23)',
    minHeight: '28px',
  },
  chip: {
    margin: theme.spacing(0.5),
  },
}));

const SettingsCurrenciesSectionOptions = () => {
  const selectElement = useRef(null);
  const {plugin} = useSelector((state) => state.global);
  const {enqueueSnackbar} = useSnackbar();
  const [processing, setProcessing] = useState(false);
  const [disableSelectCurrencies, setDisableSelectCurrencies] = useState(false);
  const [selectedCurrencies, setSelectedCurrencies] = useState(() => {
    return plugin.options.currencies.filter((item) => plugin.options.selectedCurrencies.includes(item.iso))
  });
  const [defaultCurrency, setDefaultCurrency] = useState(() => plugin.options.defaultCurrency.iso || '');
  const [openSelectElement, setOpenSelectElement] = useState(false);
  const classes = useStyles();
  const handleDelete = (currency) => () => {
    setSelectedCurrencies((selectedCurrencies) => selectedCurrencies.filter(item => currency.iso !== item.iso));
  };
  useEffect(()=>{
    !plugin?.isLicensePro && selectedCurrencies.length === 1 ? setDisableSelectCurrencies(true) : setDisableSelectCurrencies(false);  
  }, [selectedCurrencies])

  const handleSubmit = async (event) => {
    event.preventDefault();
    setProcessing(true);
    try {
      const res = await WPRequest({
        action: 'dydo_save_currencies',
        selectedCurrencies: selectedCurrencies.map((item) => item.iso),
        defaultCurrency,
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
    
      <FormSection title="Currencies" description="General currencies settings to display in donations modal">
        <FormSubSection title="Select currencies" description="Configuration of currencies that clients will have available to make donations">
          <Grid container spacing={3}>
            <Grid item md={10}>
              <Paper component="ul" className={classes.currencies}>
                {
                  selectedCurrencies.map((currency, key) => {
                    return (
                      <li key={currency.iso} style={{margin: 0}}>
                        <Chip
                          className={classes.chip}
                          label={`${currency.country.name} - ${currency.country.code}`}
                          onDelete={handleDelete(currency)}
                        />
                      </li>
                    );
                  })
                }
              </Paper>
            </Grid>
            <Grid item md={2}>
              <div>
                <Button
                  ref={selectElement}
                  variant="outlined"
                  color="primary"
                  onClick={() => setOpenSelectElement(!openSelectElement)}
                  fullWidth
                  disabled={processing || disableSelectCurrencies}  
                >
                  Currencies
                </Button>
                <Select
                  multiple
                  value={selectedCurrencies}
                  onChange={(event) => setSelectedCurrencies(event.target.value)}
                  style={{display: 'none'}}
                  open={openSelectElement}
                  onClose={() => setOpenSelectElement(!openSelectElement)}
                  MenuProps={{
                    anchorEl: selectElement.current,
                  }}
                  disabled={processing}
                >
                  {
                    plugin.options.currencies.map((currency) => (
                      <MenuItem key={currency.iso} value={currency} disabled={disableSelectCurrencies}>
                        <Checkbox disabled={disableSelectCurrencies} checked={selectedCurrencies.indexOf(currency) > -1} />
                        <ListItemText primary={`${currency.country.name} - ${currency.country.code}`} />
                      </MenuItem>
                    ))
                  }
                </Select>
              </div>
            </Grid>
          </Grid>
        </FormSubSection>
        <FormSubSection title="Select a default currency" description="Default currency settings for when a customer makes a donation">
          <FormControl variant="outlined" fullWidth>
            <InputLabel htmlFor="outlined-currency-native">Currency</InputLabel>
            <Select
              native
              value={defaultCurrency}
              label="Currency"
              onChange={(event) => setDefaultCurrency(event.target.value)}
              inputProps={{
                name: 'defaultCurrency',
                id: 'outlined-currency-native',
              }}
              disabled={processing || disableSelectCurrencies}
            >
              {
                selectedCurrencies.map((currency) => (
                  <option key={currency.iso} value={currency.iso}>
                    {`${currency.country.name} - ${currency.country.code} - ${currency.symbol}`}
                  </option>
                ))
              }
            </Select>
          </FormControl>
        </FormSubSection>
        <Box p={2}>
          <Button
            type="submit"
            variant="contained"
            color="primary"
            onClick={handleSubmit}
            disabled={processing ||selectedCurrencies.length ==0}
          >
            Save
          </Button>
        </Box>
      </FormSection>
    </>
  );
}

export default SettingsCurrenciesSectionOptions;
