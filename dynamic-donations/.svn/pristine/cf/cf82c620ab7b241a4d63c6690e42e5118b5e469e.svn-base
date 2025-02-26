import React from "react";
import { Box, Typography } from "@material-ui/core";
import { makeStyles } from "@material-ui/core";

const useStyle = makeStyles((theme) => ({
  title: {
    color: theme.palette.primary.main,
  },
}));

const SettingsCurrenciesSectionWoocommerce = () => {
  const classes = useStyle();

  return (
    <>
      <Box textAlign="center" mt={2} mb={6}>
        <Typography variant="h5" align="center" className={classes.title}>
          <Box fontWeight="fontWeightLight">
            You are using WooCommerce as a payment gateway
          </Box>
        </Typography>

        <Typography variant="body2" >
          WooCoommerce is not compatible with having multiple currencies,
          therefore the currencies tab is not available with this payment
          gateway.
        </Typography>
      </Box>
    </>
  );
};

export default SettingsCurrenciesSectionWoocommerce;
