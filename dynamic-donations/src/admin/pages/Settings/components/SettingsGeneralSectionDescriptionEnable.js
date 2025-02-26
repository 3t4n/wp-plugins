import React, { useState } from "react";
import { useSelector } from "react-redux";
import { useSnackbar } from "notistack";
import { Grid, Typography, Box, Button } from "@material-ui/core";
import FormSubSection from "../../../components/FormSubSection";
import GreenSwitch from "../../../components/GreenSwitch";
import { WPRequest } from "../../../http-common";

const SettingsGeneralSectionDescriptionEnable = () => {
  const { plugin } = useSelector((state) => state.global);
  const { enqueueSnackbar } = useSnackbar();
  const [processing, setProcessing] = useState(false);
  const [showDescription, setShowDescription] = useState(
    () => plugin.options.showDescription || false
  );

  const toggleChecked = async () => {
    setShowDescription(!showDescription);
    setProcessing(true);
    try {
      const res = await WPRequest({
        action: "dydo_save_enable_paragraphs",
        showDescription: !showDescription,
      });

      if (res.success) {
        enqueueSnackbar("Your changes have been saved", { variant: "success" });
      } else {
        enqueueSnackbar(res.data, { variant: "error" });
      }
    } catch (e) {
      enqueueSnackbar(e, { variant: "error" });
    }
    setProcessing(false);
  };

  return (
    <FormSubSection>
      <Grid container spacing={3} alignItems="center">
        <Grid item md={6}>
          <Typography variant="subtitle1">
            <Box fontWeight="fontWeightNormal">Show description</Box>
          </Typography>
          <Typography variant="body2">
            Activate the description in the donation modal that can be
            configured from Settings > Paragraphs > Description.
          </Typography>
        </Grid>
        <Grid item md={6}>
          <Box display="flex" justifyContent="flex-end">
            <GreenSwitch
              onChange={toggleChecked}
              value={showDescription}
              checked={showDescription}
              disabled={processing}
            />
          </Box>
        </Grid>
      </Grid>
    </FormSubSection>
  );
};

export default SettingsGeneralSectionDescriptionEnable;
