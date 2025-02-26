import React, { useState } from "react";
import { useSelector } from "react-redux";
import { useSnackbar } from "notistack";
import {
  FormControl,
  Button,
  Select,
  Box,
  InputLabel,
  Chip,
} from "@material-ui/core";
import SettingsOnlyPro  from "../../Settings/SettingsOnlyPro";
import Editor from "react-simple-code-editor";
import { highlight, languages } from "prismjs/components/prism-core";
import "prismjs/components/prism-clike";
import "prismjs/components/prism-css";
import "prismjs/themes/prism.css";
import FormSection from "../../../components/FormSection";
import FormSubSection from "../../../components/FormSubSection";
import { WPRequest } from "../../../http-common";

const AppearanceSectionTheme = () => {
  const { plugin } = useSelector((state) => state.global);
  const { enqueueSnackbar } = useSnackbar();
  const [processing, setProcessing] = useState(false);
  const [theme, setTheme] = useState(plugin.options.theme);
  const [code, setCode] = useState(plugin.options.customStyle);
  const isLicensePro = plugin?.isLicensePro;

  const handleChange = (event) => {
    setTheme(event.target.value);
  };

  const handleSubmit = async (event) => {
    event.preventDefault();

    setProcessing(true);
    try {
      const res = await WPRequest({
        action: "dydo_save_theme",
        customStyle: code,
        theme,
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
    <>
      <FormSection
        title="Themes"
        description="From this section set the default styles of the donations modal or customize the styles via css."
      >
        <SettingsOnlyPro>
          <FormSubSection>
            <FormControl variant="outlined" fullWidth>
              <InputLabel htmlFor="outlined-age-native-simple">
                Theme
              </InputLabel>
              <Select
                native
                value={theme}
                label="Theme"
                onChange={handleChange}
                inputProps={{
                  name: "theme",
                  id: "theme",
                }}
                disabled={processing}
              >
                <option value="default">Default</option>
                <option value="custom">Custom</option>
              </Select>
            </FormControl>
          </FormSubSection>
          {theme === "custom" && (
            <FormSubSection title="Editor">
              <Box
                border={1}
                borderColor="#dadada"
                borderRadius={5}
                maxHeight={500}
                style={{ backgroundColor: "#f9f9f9", overflow: "scroll" }}
              >
                <Editor
                  value={code}
                  onValueChange={(code) => setCode(code)}
                  highlight={(code) => highlight(code, languages.css, "css")}
                  padding={10}
                  style={{
                    fontFamily: '"Fira code", "Fira Mono", monospace',
                    fontSize: 12,
                  }}
                  disabled={processing}
                />
              </Box>
            </FormSubSection>
          )}
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
        </SettingsOnlyPro>
      </FormSection>
    </>
  );
};

export default AppearanceSectionTheme;
