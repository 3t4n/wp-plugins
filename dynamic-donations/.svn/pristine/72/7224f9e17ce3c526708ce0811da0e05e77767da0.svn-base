import React, { useState, useEffect } from "react";
import { Box, Button, TextField } from "@material-ui/core";
import FormSubSection from "../../../components/FormSubSection";
import FormSection from "../../../components/FormSection";
import { WPRequest } from "../../../http-common";
import { useSelector } from "react-redux";
import { useSnackbar } from "notistack";
import SettingsOnlyPro from "../../Settings/SettingsOnlyPro";

const SettingsParagraphsSectionButtons = () => {
  const { plugin } = useSelector((state) => state.global);
  const { enqueueSnackbar } = useSnackbar();
  const [processing, setProcessing] = useState(false);
  const [labelButton, setLabelButton] = useState(
    () => plugin.options.labelButton || ""
  );

  const handleSubmit = async (event) => {
    event.preventDefault();

    setProcessing(true);
    try {
      const res = await WPRequest({
        action: "dydo_save_label_button",
        labelButton,
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
    <SettingsOnlyPro>
      <FormSection title="Buttons">
        <FormSubSection
          title="Open modal:"
          description="Button text to open donations modal."
        >
          <form onSubmit={handleSubmit}>
            <Box mb={3}>
              <TextField
                name="label"
                id="label-button"
                label="Label"
                fullWidth
                variant="outlined"
                value={labelButton}
                onChange={(event) => setLabelButton(event.target.value)}
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
    </SettingsOnlyPro>
  );
};

export default SettingsParagraphsSectionButtons;
