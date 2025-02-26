import React, { useState } from "react";
import { useSnackbar } from "notistack";
import { Box, Grid, Typography, Button } from "@material-ui/core";
import FormSubSection from "../../../components/FormSubSection";
import FormSection from "../../../components/FormSection";
import { WPRequest } from "../../../http-common";

const StripeSectionSync = () => {
  const { enqueueSnackbar } = useSnackbar();
  const [processing, setProcessing] = useState(false);

  const syncRecurringPaymentStripe = async () => {
    try {
      setProcessing(true);
      const users = await WPRequest({
        action: "dydo_stripe_get_users_to_sync",
      });
      if (users.success && users.data.length > 0) {
        for (let user of users.data) {
          const subscriptions = await WPRequest({
            action: "dydo_stripe_sync_recurring_donations",
            user_id: user.ID,
          });

          if (subscriptions?.success) {
            enqueueSnackbar(
              `User with ID ${user.ID} synced with stripe and got ${subscriptions.data.total} subscriptions where ${subscriptions.data.added} were added, ${subscriptions.data.updated} updated and ${subscriptions.data.failed} failed. `,
              { variant: "success" }
            );
            const donations = await WPRequest({
              action: "dydo_stripe_sync_recurring_donations_payments",
              user_id: user.ID,
            });
            if (donations?.success) {
              enqueueSnackbar(
                `User with ID ${user.ID} subscription payments synced with stripe and were  ${donations.data.added} added and ${donations.data.failed} failed. `,
                { variant: "success" }
              );
            } else {
              enqueueSnackbar(donations.data, {
                variant: "error",
              });
              break;
            }
            continue;
          } else {
            enqueueSnackbar(subscriptions.data, {
              variant: "error",
            });
            break;
          }
        }
      }
      setProcessing(false);
      return;
    } catch (e) {
      enqueueSnackbar(e, { variant: "error" });
      setProcessing(false);
      return;
    }
  };

  // const addMetadataToSubs = async () => {
  //   try {
  //     setProcessing(true);
  //     const response = await WPRequest({
  //       action: "dydo_stripe_add_metadata_to_subs",
  //     });
  //     console.log(response);
  //     setProcessing(false);
  //   } catch (e) {
  //     enqueueSnackbar(e, { variant: "error" });
  //     setProcessing(false);
  //     return;
  //   }
  // };

  const syncOneTimePaymentStripe = async () => {
    try {
      setProcessing(true);
      const response = await WPRequest({
        action: "dydo_stripe_get_users_to_sync",
      });
      if (response.success && response.data.length > 0) {
        for (let user of response.data) {
          const res = await WPRequest({
            action: "dydo_stripe_sync_onetime_donations",
            user_id: user.ID,
          });
          if (res?.success) {
            const data = res.data;
            enqueueSnackbar(
              `User with ID ${user.ID} synced with stripe and got ${data.total} payment intents where ${data.added} were added, ${data.updated} updated and ${data.failed} failed. `,
              { variant: "success" }
            );
            continue;
          } else {
            enqueueSnackbar(res.data, {
              variant: "error",
            });
            setProcessing(false);
            break;
          }
        }
        enqueueSnackbar("Finished syncing onetime payments", {
          variant: "success",
        });
        setProcessing(false);
        return;
      }
      enqueueSnackbar("No users found to sync with stripe.", {
        variant: "success",
      });
    } catch (e) {
      enqueueSnackbar(e, { variant: "error" });
      setProcessing(false);
      return;
    }
  };

  return (
    <FormSection title="Sync data between Dynamic Donations and Stripe">
      <FormSubSection>
        <Grid container spacing={3} alignItems="center">
          <Grid item xs={6}>
            <Typography variant="subtitle1">
              <Box fontWeight="fontWeightNormal">
                Sync with One Time payments with Stripe
              </Box>
            </Typography>
            <Typography variant="body2">
              This will sync any missing one time payments with Stripe.
            </Typography>
          </Grid>
          <Grid item xs={6}>
            <Box display="flex" justifyContent="flex-end">
              <Button
                color="primary"
                variant="outlined"
                label="Sync"
                disabled={processing}
                onClick={syncOneTimePaymentStripe}
              >
                Sync one time payments
              </Button>
            </Box>
          </Grid>
          {/* <Grid item xs={6}>
            <Typography variant="subtitle1">
              <Box fontWeight="fontWeightNormal">Add Metadata</Box>
            </Typography>
            <Typography variant="body2">Add Metadata</Typography>
          </Grid>
          <Grid item xs={6}>
            <Box display="flex" justifyContent="flex-end">
              <Button
                color="primary"
                variant="outlined"
                label="Sync"
                disabled={processing}
                onClick={addMetadataToSubs}
              >
                Add Metadata
              </Button>
            </Box>
          </Grid> */}
          <Grid item xs={6}>
            <Typography variant="subtitle1">
              <Box fontWeight="fontWeightNormal">
                Sync with Recurring payments with Stripe
              </Box>
            </Typography>
            <Typography variant="body2">
              This will sync and update recurring time payments with Stripe.
            </Typography>
          </Grid>
          <Grid item xs={6}>
            <Box display="flex" justifyContent="flex-end">
              <Button
                color="primary"
                variant="outlined"
                label="Sync"
                disabled={processing}
                onClick={syncRecurringPaymentStripe}
              >
                Sync recurring payments
              </Button>
            </Box>
          </Grid>
        </Grid>
      </FormSubSection>
    </FormSection>
  );
};

export default StripeSectionSync;
