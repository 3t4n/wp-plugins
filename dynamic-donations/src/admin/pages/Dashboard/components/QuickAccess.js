import React from 'react';

import { Button, Card, CardActions, CardContent, Grid, Typography, Box, makeStyles } from '@material-ui/core';
import { Settings as SettingsIcon } from '@material-ui/icons';

import WooIcon from '../images/woocommerce.svg';
import StripeIcon from '../images/stripe.svg';
import MasterCardIcon from '../images/mastercard.svg';
import BitcoinIcon from '../images/bitcoin.svg';
import { Link } from 'react-router-dom';

const useStyles = makeStyles(theme => ({
  icon: {
    height: 45,
  },
}));

export default function QuickAccess() {
  const classes = useStyles();

  return (
    <>
      <Typography variant={'h5'}>Quick Access:</Typography>

      <Box mt={3}>
        <Grid container spacing={3}>
          <Grid item xs={12} sm={6} md={4} xl={3}>
            <Card>
              <CardContent>
                <Box mb={2}>
                  <img src={WooIcon} className={classes.icon} alt="" />
                </Box>
                <Typography variant={'h6'}>Woocommerce</Typography>
                <Typography variant={'body2'}>Payment Method</Typography>
              </CardContent>
              <hr/>
              <CardActions>
                <Button
                  size={'small'}
                  variant={'outlined'}
                  startIcon={<SettingsIcon />}
                  component={Link}
                  to={'/payments/woocommerce'}
                  disableElevation
                >
                  Configure
                </Button>
              </CardActions>
            </Card>
          </Grid>
          <Grid item xs={12} sm={6} md={4} xl={3}>
            <Card>
              <CardContent>
                <Box mb={2}>
                  <img src={StripeIcon} className={classes.icon} alt="" />
                </Box>
                <Typography variant={'h6'}>Stripe</Typography>
                <Typography variant={'body2'}>Payment Method</Typography>
              </CardContent>
              <hr/>
              <CardActions>
                <Button
                  size={'small'}
                  variant={'outlined'}
                  startIcon={<SettingsIcon />}
                  component={Link}
                  to={'/payments/stripe'}
                  disableElevation
                >
                  Configure
                </Button>
              </CardActions>
            </Card>
          </Grid>
          <Grid item xs={12} sm={6} md={4} xl={3}>
            <Card>
              <CardContent>
                <Box mb={2}>
                  <img src={MasterCardIcon} className={classes.icon} alt="" />
                </Box>
                <Typography variant={'h6'}>Currencies</Typography>
                <Typography variant={'body2'}>-</Typography>
              </CardContent>
              <hr/>
              <CardActions>
                <Button
                  size={'small'}
                  variant={'outlined'}
                  startIcon={<SettingsIcon />}
                  disableElevation
                >
                  Currencies
                </Button>
              </CardActions>
            </Card>
          </Grid>
          <Grid item xs={12} sm={6} md={4} xl={3}>
            <Card>
              <CardContent>
                <Box mb={2}>
                  <img src={BitcoinIcon} className={classes.icon} alt="" />
                </Box>
                <Typography variant={'h6'}>Amounts</Typography>
                <Typography variant={'body2'}>-</Typography>
              </CardContent>
              <hr/>
              <CardActions>
                <Button
                  size={'small'}
                  variant={'outlined'}
                  startIcon={<SettingsIcon />}
                  disableElevation
                >
                  Amounts
                </Button>
              </CardActions>
            </Card>
          </Grid>
        </Grid>
      </Box>
    </>
  );
}
