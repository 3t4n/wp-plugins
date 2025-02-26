import React, { useEffect, useState } from "react";
import { useSelector } from "react-redux";
import { useSnackbar } from "notistack";
import {
  Box,
  Button,
  TextField,
  Grid,
  Checkbox,
  Typography,
  FormControlLabel,
} from "@material-ui/core";
import FormSubSection from "../../../components/FormSubSection";
import FormSection from "../../../components/FormSection";
import { WPRequest } from "../../../http-common";

const SettingsReceiptsSectionOptions = () => {
  const { plugin } = useSelector((state) => state.global);
  const { enqueueSnackbar } = useSnackbar();
  const [smtpCredentialsFormReady, setSmtpFormReady] = useState(false);
  const [processing, setProcessing] = useState(false);
  const [receipts, setReceipts] = useState(plugin.options.receipts.send);
  const [smtp, setSmtp] = useState(plugin.options.receipts.smtp);
  const [smtpCredentials, setSmtpCredentials] = useState(
    plugin.options.receipts.smtp_settings
  );
  const [customParagraph, setCustomParagraph] = useState(
    plugin.options.receipts.custom_paragraph
  );
  const [bcc, setBcc] = useState(plugin.options.receipts.bcc);

  const handleChecked = async (name, event) => {
    if (name === "receipts") {
      setProcessing(true);
      setReceipts(event.target.checked);
      // await handleManageWebhook(event.target.checked);
      setProcessing(false);
    }
    if (name === "smtp") {
      setSmtp(event.target.checked);
    }
  };

  const handleChange = (name, value) => {
    if (name === "custom_paragraph") {
      setCustomParagraph(value.trim());
      return;
    }
    if (name === "bcc") {
      setBcc(value.trim());
      return;
    }
    let changeSmtp = [];
    Object.assign(changeSmtp, smtpCredentials);
    if (name != "" && value != "") {
      changeSmtp[name] = value;
    }
    if (
      smtp &&
      changeSmtp.host.trim() != "" &&
      changeSmtp.port.trim() != "" &&
      changeSmtp.from.trim() != "" &&
      changeSmtp.from_name.trim() != ""
    ) {
      setSmtpFormReady(true);
      if (
        changeSmtp.auth == "true" &&
        (changeSmtp.username.trim() == "" || changeSmtp.password.trim() == "")
      ) {
        setSmtpFormReady(false);
      }
    } else {
      setSmtpFormReady(false);
    }
    setSmtpCredentials({ ...changeSmtp });
  };

  const handleSubmit = async (event) => {
    event.preventDefault();
    setProcessing(true);
    try {
      const res = await WPRequest({
        action: "dydo_save_receipts_settings",
        receipts: receipts,
        smtp: smtp,
        smtpSettings: JSON.stringify(smtpCredentials),
        customParagraph: customParagraph,
        bcc: bcc,
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
  
  // const handleManageWebhook = async (isChecked) => {
  //   try {
  //     const res = await WPRequest({
  //       action: 'dydo_create_webhook',
  //       createWebhook:isChecked
  //     });

  //     if (res.success) {
  //       if (isChecked) {
  //         enqueueSnackbar('Webhook has been created', {variant: 'success'});
  //       }else{
  //         enqueueSnackbar('Webhook has been deleted', {variant: 'success'});
  //       }
  //     } else {
  //       enqueueSnackbar(res.data, {variant: 'error'});
  //     }
  //   } catch (e) {
  //     enqueueSnackbar(e, {variant: 'error'});
  //   }
  // }

  useEffect(() => {
    handleChange("", "");
  }, [smtp]);

  return (
    <FormSection
      title="Receipts"
      description="From this section you can configure the default amounts and the amount selected by default and you can also establish which amounts can be displayed"
    >
      <FormSubSection>
        <Grid container spacing={3} alignItems="center">
          <Grid item md={6}>
            <FormControlLabel
              label="Send receipts"
              control={
                <Checkbox
                  checked={receipts === true}
                  name="receipts"
                  color="primary"
                  onChange={async (event) =>
                    await handleChecked("receipts", event)
                  }
                  disabled={processing}
                />
              }
            />
          </Grid>
        </Grid>
      </FormSubSection>
      {receipts && (
        <>
          <FormSubSection>
            <Grid container spacing={3} alignItems="center">
              <Grid item xs={12}>
                <Typography variant={"subtitle1"}>Blind copy carbon</Typography>
              </Grid>
              <Grid item xs={12} lg={6}>
                <TextField
                  type="text"
                  name="bcc"
                  label="BCC address"
                  variant="outlined"
                  defaultValue={bcc}
                  onChange={(event) => handleChange("bcc", event.target.value)}
                  fullWidth
                  disabled={!receipts}
                />
              </Grid>
              <Grid item xs={12}>
                <Typography variant={"subtitle1"}>
                  Custom paragraph for receipts
                </Typography>
              </Grid>
              <Grid item xs={12}>
                <TextField
                  fullWidth
                  multiline
                  minRows={10}
                  defaultValue={customParagraph}
                  type="text"
                  name="custom_paragraph"
                  label="Paragraph"
                  variant="outlined"
                  onChange={(event) =>
                    handleChange("custom_paragraph", event.target.value)
                  }
                  disabled={!receipts}
                  required
                />
              </Grid>
            </Grid>
          </FormSubSection>
          <FormSubSection>
            <Grid container spacing={3} alignItems="center">
              <Grid item md={12}>
                <Typography variant={"subtitle1"}>
                  SMTP Server Credentials
                </Typography>
              </Grid>
              <Grid item md={12}>
                <FormControlLabel
                  label="Custom SMTP server"
                  control={
                    <Checkbox
                      checked={smtp}
                      name="smtp"
                      color="primary"
                      onChange={async (event) => {
                        await handleChecked("smtp", event);
                      }}
                      disabled={!receipts}
                    />
                  }
                />
              </Grid>
            </Grid>
          </FormSubSection>
          {smtp && (
            <FormSubSection>
              <Grid container spacing={3} alignItems="center">
                <Grid item xs={6} lg={6}>
                  <TextField
                    minRows={4}
                    type="text"
                    name="host"
                    label="Host"
                    variant="outlined"
                    defaultValue={smtpCredentials.host}
                    onChange={(event) =>
                      handleChange("host", event.target.value)
                    }
                    fullWidth
                    disabled={!smtp}
                    required
                  />
                </Grid>
                <Grid item xs={6} lg={6}>
                  <TextField
                    type="text"
                    name="port"
                    label="Port"
                    variant="outlined"
                    defaultValue={smtpCredentials.port}
                    // value={item.amount}
                    onChange={(event) =>
                      handleChange("port", event.target.value)
                    }
                    fullWidth
                    disabled={!smtp}
                    required
                  />
                </Grid>
                <Grid item xs={6} lg={6}>
                  <TextField
                    type="text"
                    name="from"
                    label="From email"
                    variant="outlined"
                    defaultValue={smtpCredentials.from}
                    // value={item.amount}
                    onChange={(event) =>
                      handleChange("from", event.target.value)
                    }
                    fullWidth
                    disabled={!smtp}
                    required
                  />
                </Grid>
                <Grid item xs={6} lg={6}>
                  <TextField
                    type="text"
                    name="from_name"
                    label="From name"
                    variant="outlined"
                    defaultValue={smtpCredentials.from_name}
                    onChange={(event) => {
                      handleChange("from_name", event.target.value);
                    }}
                    fullWidth
                    disabled={!smtp}
                    required
                  />
                </Grid>
                <hr></hr>
                <Grid item xs={12} md={12} lg={12} mt={2}>
                  <Typography variant={"subtitle1"}>
                    SMTP Authentication server
                  </Typography>
                </Grid>
                <Grid item xs={12} lg={4}>
                  <FormControlLabel
                    label="Use authentication"
                    control={
                      <Checkbox
                        checked={smtpCredentials.auth === "true"}
                        name="authentication"
                        color="primary"
                        onChange={(event) =>
                          handleChange("auth", event.target.checked.toString())
                        }
                        disabled={!receipts}
                      />
                    }
                  />
                </Grid>
                <Grid item xs={6} lg={4}>
                  <TextField
                    type="text"
                    name="username"
                    label="Username"
                    variant="outlined"
                    defaultValue={smtpCredentials.username}
                    // value={item.amount}
                    onChange={(event) =>
                      handleChange("username", event.target.value)
                    }
                    fullWidth
                    disabled={!smtp || smtpCredentials.auth == "false"}
                    required
                  />
                </Grid>
                <Grid item xs={6} lg={4}>
                  <TextField
                    type="password"
                    name="password"
                    label="Password"
                    variant="outlined"
                    defaultValue={smtpCredentials.password}
                    // value={item.amount}
                    onChange={(event) =>
                      handleChange("password", event.target.value)
                    }
                    fullWidth
                    disabled={!smtp || smtpCredentials.auth == "false"}
                    required
                  />
                </Grid>
              </Grid>
            </FormSubSection>
          )}
        </>
      )}

      <Box p={2}>
        <Button
          type="submit"
          variant="contained"
          color="primary"
          onClick={handleSubmit}
          disabled={
            processing ||
            !receipts ||
            (receipts && customParagraph.trim() === "") ||
            (smtp && !smtpCredentialsFormReady)
          }
        >
          save
        </Button>
      </Box>
    </FormSection>
  );
};

export default SettingsReceiptsSectionOptions;
